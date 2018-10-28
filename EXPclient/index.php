<?php
include('engine.php');
  $user = new userclass();
  $user->GetUPDSQL();
  $user->GetExData('01.01.2018','01.02.2018',1);

?>