<?php
include('mysql.php');
require 'rb.php';

//include('declare.php');
class userclass{

  var $db;
  var $db_oz;
  var $db_ur; 
  var $alert_upd;
  var $html_menu;
  var $count;
  var $freshDB;
  var $ListServ;
  var $ListServ1;
  var $twig;
  var $loader;



function init(){

	session_start();
   include 'declare.php';
	 //$db = $this->db = new SafeMySQL($opts); 
  R::setup('mysql:host='.$opts['host'].';dbname='.$opts['db'],$opts['user'],$opts['pass']);
   if (!R::testConnection()){
    exit ('Нет Соединения с базой данных');
 
	 Currentdate();
	 $this->needUPD();$this->Malohod();
	 // $this->html_menu=SetMenu();

}

function Currentdate(){
   $currdate=new \DateTime (date ("Y-m-d H:i:s"));
   $currdate->settimezone(new DateTimeZone('Europe/Samara'));
   // $currdate=$currdate->format('d-m-Y H:i:s');
  return $currdate;
}

 function ServNameShort($nameserver){//Слова исключения из названия
  $nameserver=str_replace("Сеть",' ',$nameserver);
  $nameserver=str_replace("аптек",' ',$nameserver);
  $nameserver=str_replace("г. Шымкент",' ',$nameserver);
  $nameserver=str_replace('Меховой салон Bolgar г.Нижневартовск', '', $nameserver);
 return $nameserver;

 }

 function needUPD(){
	 $fresh=R::load('UPDATE_TIME',1);
   $freshDB=$fresh->lastupdate;
	 $freshDB=new \DateTime ($freshDB);


   $currentdate=currentdate();
	 $diff1=$currentdate->diff($freshDB);
	 $diff_i=$diff1->i ;
	 $diff_h=$diff1->h;

	// if (($diff_i>10)or((abs($diff_h))>0)){$alert_upd='<a class="badge badge-danger" data-toggle="modal" data-target="#Update" href="#"> Обновить</a>';}else {$alert_upd='';}
	return print_r($freshDB->format('d-m-Y H:i:s'));
  }

 function SetMenu(){
 	$html_menu=file_get_contents("./engine/menu.php");
  $UpdateNOW=R::getCell('SELECT updatenow from UPDATE_TIME');
  if ($UpdateNOW==1){$alert_upd='<span class="badge badge-warning"> Обновляем</span>';
  $html_menu=str_replace(":=disabled=:",'',$html_menu);}
  else{$html_menu=str_replace(":=disabled=:",' ',$html_menu);}
 	//$html_menu=str_replace(":=alert_upd=:",needUPD()->$alert_upd,$html_menu);
 	$html_menu=str_replace(":=count=:",Malohod(),$html_menu);

  $s='<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#Login" href="#">Войти </a></li>';
  $s1='<!--monitor-->';
  $d3='<li class="nav-item"><a class="nav-link" style="display: inline-block" href="./index.php" > Мониторинг синхронизации</a></li>';
  if (isset($_SESSION['logged_user'])){
     if ($_SESSION['logged_user']->admin !=='1'){

        $d='<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#Login" href="#">'.$_SESSION['logged_user']->login.'</a></li>
        <li class="nav-item"><a class="nav-link"   href="./index.php?action=1">Выйти </a></li>';}
      else {$d='<li class="nav-item" ><a class="nav-link" style="color:red" data-toggle="modal"
         data-target="#Login" href="#">'.$_SESSION['logged_user']->login.'</a></li>
          <li class="nav-item"><a class="nav-link"   href="./index.php?action=1">Выйти </a></li>';
          $d2='<li class="dropdown-submenu">
                  <a class="dropdown-item" tabindex="-1" href="./reg_user.php">Добавить пользователя</a>
                </li>';
          
          $d3='<div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle" data-target="#" href="./index.php"> Мониторинг синхронизации<span class="caret"></span>
            </a>
        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
                <a class="dropdown-item" tabindex="-1" href="#">Общий заказ</a>
                <ul class="dropdown-menu">
                 <li><a class="dropdown-item disabled" href="./oz_clients.php">Получатели</a></li>
</li></ul></div>';    }
      $html_menu=str_replace($s,$d,$html_menu);
      $html_menu=str_replace('<!--reg_user-->',$d2,$html_menu);
   };
   $html_menu=str_replace($s1,$d3,$html_menu);
  return print_r($html_menu);

 	}

 function logFile($textLog) {
$file = './logs/logFile.txt';
  $textLog=mb_convert_encoding($textLog, "windows-1251", "utf-8");
   $log = date('Y-m-d H:i:s') . ' ' . print_r($textLog, true);
   return file_put_contents($file, $log . PHP_EOL, FILE_APPEND);//__DIR__ . '/log.txt'

}



include'IO_data.php';
include'OZ.php';
include'getdat.php';

function GetBigData($url){
    
    $this->html='
<div id="cntnt">
  <div class="row" style="min-height:1rem"> </div>
  <div class="row" style="min-height:15rem">
    <div class="col-3" style="font-size: 1.2rem;">
      <div> </div> 
    </div>
  <div class="col-4">Получаем данные с удаленных серверов </div>
  <div class="col-4">
    <div id="p_prldr"><div class="contpre"><span class="svg_anm"></span><img src="./images/load.gif"></div></div>
  </div>
 </div>';
 $this->htmlSC='  
 <script type="text/javascript">$(window).on("load", function () {
  document.location.href = ":===:";
});</script>';
$this->htmlSC=str_replace(":===:",$url,$this->htmlSC);

$this->html=$this->html.$this->htmlSC;
print_r($this->html);


  }

}
}

?>