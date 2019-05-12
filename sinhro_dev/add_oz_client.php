<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$nameserver = $_POST['nameserver'];
	//$url = $_POST['url'];	
}
include('./engine/user.lib.php');
$user = new userclass();
$user->init();  
 //$db=$user->db;

$SQL='INSERT INTO OZ_CLIENTS (name,p_id,status) values("'.$nameserver.'",999,0)';
R::exec($SQL);

header("Location:./OZ_CLIENTS.php");
?>