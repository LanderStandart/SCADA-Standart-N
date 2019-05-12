<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
	$status = $_GET['status'];
	$idserv = $_GET['idserv'];
	$profile_id = $_GET['profile_id'];		
}
include('./engine/user.lib.php');
$user = new userclass();
$user->init();


  $SQL='UPDATE SIN_STAT_PROFILES SET status='.$status.' where idserv='.$idserv.' and profile_id='.$profile_id.'';
R::exec($SQL);


header("Location:profiles.php?id=".$idserv);


?>