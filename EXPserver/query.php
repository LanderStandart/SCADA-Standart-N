<?php
header('Content-Type: text/xml; charset=utf-8');
$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, ' ');
xmlwriter_start_document($xw, '1.0', 'utf-8');
xmlwriter_start_element($xw,"root");

include('mysql.php');
//header('Content-Type: text/xml; charset=utf-8');
$opts = array(
      'host'    => '192.168.67.62',
      'user'    => 'homestead',
      'pass'      => '',
      'charset'   => 'utf8',
      'db'      => 'EXPORT'
  	);
	 $db = new SafeMySQL($opts); 



$insertdt=$db->getone('SELECT insertdt FROM QUERYS');
xmlwriter_start_element($xw,"insertdt");
  xmlwriter_text($xw,$insertdt);
  xmlwriter_end_element($xw);

$query=$db->getone('SELECT value FROM QUERYS');
xmlwriter_start_element($xw,"query");
  xmlwriter_text($xw,$query);
  xmlwriter_end_element($xw);
// $currdate=new \DateTime (date ("Y-m-d H:i:s"));
// $currdate->settimezone(new DateTimeZone('Europe/Samara'));
//echo $currdate->format('d-m-Y H:i:s');
    xmlwriter_end_element($xw);
echo xmlwriter_output_memory($xw);
?>