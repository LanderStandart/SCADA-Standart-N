<?php
include_once('./engine/user.lib.php');
$user = new userclass();$user->init();//$db=$user->db;
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$caption = $_POST['caption'];
	$head = $_POST['head'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	$id = $_POST['cid'];
	$iin = $_POST['iin'];	
if ($id<>''){
	$SQL='UPDATE OZ_CLIENTS set name="'.$caption.'" , p_id='.$head.' ,email="'.$email.'" ,status="'.$status.'" ,address
	="'.$address.'",iin="'.$iin.'" where id='.$id;
  
   header("Location:oz_client_detail.php?cid=".$id);		
	} else {
	$SQL = 'INSERT INTO OZ_CLIENTS (name,p_id,email,status,address,iin) VALUES ("'.$caption.'" ,'.$head.' ,"'.$email.'","'.$status.'" ,"'.$address.'","'.$iin.'") '	;
	}
 R::exec($SQL);
header("Location:oz_client.php?id=".$head);
}			

?>