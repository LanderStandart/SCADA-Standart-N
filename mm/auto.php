<?php header('Content-Type: text/html; charset=utf-8');
include('engine/user.lib.php'); //подключаемся к БД
 $user = new userclass();
  $user->init();
  $where=iconv('windows-1251', 'utf-8', $_GET['search']);
$s='SELECT SNAME from WAREBASE_G where SNAME containing(\''.$where.'\')';
//print_r($s);

$q=ibase_query($user->default_trn,$s);

while ($rw=ibase_fetch_row($q)){
		 echo iconv('utf-8','windows-1251', $row->SNAME)."<br>";}
		//$return_arr[] = iconv('utf-8','windows-1251', $row->SNAME);}
	//}
//echo json_encode($return_arr); 
?>
