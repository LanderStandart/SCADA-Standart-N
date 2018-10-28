<?php

include_once("export.php");
  $user = new userclass();
  
$user->db_init();
$user->getdata('22.10.2018','23.10.2018',3);

?>