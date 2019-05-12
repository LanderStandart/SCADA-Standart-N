

<?php

// include('engine/user.lib.php'); //подключаемся к БД
/* $user = new userclass();
  $user->init();
   $where= $_GET['term'];
  //$where=iconv('windows-1251', 'utf-8', $_GET['term']);
$user->ConnectFirebirdSQL();
 
  $where=iconv("utf-8","windows-1251", $where);
$s="SELECT first 3 SNAME from WAREBASE_G where SNAME containing('".$where."')";
$q=ibase_query($s);

while ($rw=ibase_fetch_row($q)){
		//echo iconv('windows-1251','utf-8', $rw[0])."<br>";
		 //$return_arr[]=$rw[0];

		$return_arr[] = iconv('windows-1251','utf-8',str_replace('.', '',  $rw[0]));
//echo "[[".iconv('windows-1251','utf-8',str_replace('.', '',  $rw[0]))."]]<br>";
	    
	}
//print_r($return_arr);	
   // $pattern = '/^'.preg_quote($_GET['term']).'/iu';
*/   
$return_arr = array("Астра","Альтон", "Нарцисс", "Роза", "Пион", "Примула",
			      "Подснежник", "Мак", "Первоцвет", "Петуния", "Фиалка");		
		echo json_encode($return_arr);

?>

