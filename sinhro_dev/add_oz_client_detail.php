<?php
 include('./header.php');
  //include_once('./engine/user.lib.php');
 $user = new userclass();
 //$user->init();
$edit='';
AddOZClient($_GET['cid'],$edit);
// include('./engine/footer.php'); 

?>