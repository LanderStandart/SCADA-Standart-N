<?php

  
header('Content-Type: text/html; charset=utf-8'); ?>

<head><link rel="stylesheet" href="./css/app.css">
 <link rel="stylesheet" href="./css/style.css">
 <script src="./js/jquery.min.js"></script>
   <script src="./js/popper.min.js"></script>
     <script src="./js/bootstrap.min.js"></script>
     <link rel="shortcut icon" href="favicon.ico">
 <title>Управление клиентами Стандарт-Н  </title>    
</head>

 
<?php
require('./engine/user.lib.php');
$user = new userclass();
$user->init();
  $s='SELECT COUNT(id) FROM MALOHOD where CAST(dt as Date)<CURRENT_DATE ';  
  $malohod=R::getCell($s);
  if ($malohod!=0){$count=$malohod;}else {$count='';}

require_once './vendor/autoload.php';

	//Twig_Autoloader::register();

	 

	$loader = new Twig_Loader_Filesystem('tmpl');

	$twig = new Twig_Environment($loader, array(

	    'cache'       => 'compilation_cache',

	    'auto_reload' => true

	)); 

	$menu=require'./tmpl/menu_tree.php';
	$login=require'./tmpl/login_menu.php';
	if (!isset($_SESSION)){$session =  array('logged_user' => 'Войти' );} else {$session = $_SESSION;}
	//print_r($session);
 echo $twig->render('menu_base.html', array('sidebarMenu' => $menu));
	 echo $twig->render('menu.html', array('sidebarMenu' => $menu, 'LogIn1'=>$session));
	 echo $twig->render('menu.html', array('sidebarMenu' => $login, 'LogIn1'=>$session));
	  echo $twig->render('menu_bend.html', array('sidebarMenu' => $menu));
	//$item =array ('display'=>'display: inline-block','url'=>'./index.php') ;
// $item =array (
//  		array('display'=>'display: inline-block','url'=>'./index.php','itemname'=>'Мониторинг cинхронизации'),
//  		array('display'=>'display: inline-block','url'=>'./malohod.php','itemname'=>'Малоходовка')


// );
//  echo $twig->render('menu.php',array('item' => $item));
// SetMenu(); 

 

?>