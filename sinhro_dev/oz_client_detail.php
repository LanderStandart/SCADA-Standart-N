<?php
if (!isset($_GET['edit']) ){
 $edit=0;	
 include('./header.php');}
   elseif((($_GET['edit']=='qq'))or(($_GET['edit']=='back'))){$edit=$_GET['edit'];include_once('./engine/user.lib.php');
$user = new userclass();$user->init();$db=$user->db;};

GetOZClient($_GET['cid'],$edit);
// include('./engine/footer.php'); 

?>