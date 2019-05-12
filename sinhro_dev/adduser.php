<?php
include_once('./engine/user.lib.php');
$user = new userclass();
$user->Init();
$data=$_POST;
$salt = '!@#$^%*&()_(*&^%TWRFsfdbghjgui7564u5y4wtefdsfbghjyfi76uy5';

if (strlen(trim($data['login']))>3){ 
 $Loggin = R::dispense('users');
        $Loggin->login = $data['login'];
        $Loggin->name = $data['FIO'];
        $Loggin->password = md5($data['password'].$salt);
        //$Loggin->password = password_hash($data['password'], PASSWORD_DEFAULT); 
        //пароль нельзя хранить в открытом виде, 
        //мы его шифруем при помощи функции password_hash для php > 5.6
         
        R::store($Loggin);

header("Location: index.php");}

header("Location: ./reg_user.php");
//print_r($user->AddUser());
?>