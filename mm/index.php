﻿<?php
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//<meta http-equiv="Content-Language" content="ru" />
// кодировка должна быть уникод utf-8
//http://cf:8080/kzf/mastermanager/
  include_once("engine/user.lib.php");
  $user = new userclass();
  $user->init();
   
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="ru" />
<title>АУ :: Сводный менеджер</title>
<link href="_res/_main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./css/app.css">
 <link rel="stylesheet" href="./css/style.css">
 <script src="./js/jquery.min.js"></script>
   <script src="./js/popper.min.js"></script>
     <script src="./js/bootstrap.min.js"></script>
     <script src="./_res/ajax.js"></script>
     <link rel="shortcut icon" href="favicon.ico">

</head>
<body>

<div class="menu"><?php echo $user->html_menu; ?></div>
<div class="wrap">
  <div id="d_content" class="content"><?php echo $user->html_content; ?></div>
</div>
<div class="bottom">НВП Стандарт-Н</div>
</body>
</html>
