<?php
include_once('./engine/user.lib.php');
$user = new userclass();
$user->enter();
header("Location:index.php");
?>