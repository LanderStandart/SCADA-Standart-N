<?php
header('Content-Type: text/html; charset=cp1251');
include_once("./engine/GetFtpfromPartner.php");
  $user = new userclass();
  $user->ftpPartner('partner15339','AYJXS-wlubj-4ami-5uvo-ksbzn');
  // print_r($user->result);
  // print_r($user->user);
  $user->ReadCSV($user->user);

?>