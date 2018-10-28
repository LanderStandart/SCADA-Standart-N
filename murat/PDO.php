<?php
$GLOBALS["DB_DATABASENAME"]="localhost:E:\\base\\ZTRADE.FDB";
$GLOBALS["DB_USER"]="SYSDBA";
$GLOBALS["DB_PASSWD"]="masterkey";

$str_conn="firebird:dbname=E:\base\ZTRADE.FDB;host=localhost";
$db= new PDO($str_conn, $GLOBALS["DB_USER"], $GLOBALS["DB_PASSWD"]);


?>