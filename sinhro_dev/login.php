<?php
include_once('./engine/user.lib.php');
$user = new userclass();
$user->Init();
$salt = '!@#$^%*&()_(*&^%TWRFsfdbghjgui7564u5y4wtefdsfbghjyfi76uy5';
$data=$_POST;
print_r($data);
if ( isset($data['do_login']) )
{
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ( $user )
    {
        //логин существует
        //if ( password_verify($data['password'], $user->password) )
        if (md5($data['password'].$salt)==$user->password)
        {
            //если пароль совпадает, то нужно авторизовать пользователя
            $_SESSION['logged_user'] = $user;
			header("Location:index.php");
        }else
        {
            $errors[] = 'Неверно введен пароль!';
        }
 
    }else
    {
        $errors[] = 'Пользователь с таким логином не найден!';
    }
     
    if ( ! empty($errors) )
    {
        //выводим ошибки авторизации
        echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
    }
 
}


?>