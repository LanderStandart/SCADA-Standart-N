<?php
include('./header.php');
include('./engine/simple_html_dom.php');
//include('./engine/user.lib.php');
function request($url,$post){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на
  curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4
  // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  // curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt'); // сохранять куки в файл
  // curl_setopt($ch, CURLOPT_COOKIEFILE,  dirname(__FILE__).'/cookie.txt');
  curl_setopt($ch, CURLOPT_POST, $post!==0 ); // использовать данные в post
  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}


function isAuth( $data ){
  return preg_match('#<form[^>]+id="logout"#Usi',$data);
}
$data = request('http://wiki.standart-n.ru/index.php?title=%D0%A1%D0%BB%D1%83%D0%B6%D0%B5%D0%B1%D0%BD%D0%B0%D1%8F:%D0%92%D1%85%D0%BE%D0%B4&returnto=Duty%3A%D0%94%D0%B5%D0%B6%D1%83%D1%80%D1%81%D1%82%D0%B2%D0%B0',0);
$data=str_get_html($data);
// $pos = strpos($data,'wpLoginToken');
// $key = substr($data,$pos+21,32);
// print_r($key);
$token=$data->find('input[name="wpLoginToken"]',0)->value;
$post='wpName=Lander'.chr('13').chr(10).'
wpPassword=Lkdi37djd
wpLoginAttempt=Войти
wpLoginToken='.$token;
print_r($post);
echo isAuth(request($data,$post))?'Success':'Failed';
$url = request('http://wiki.standart-n.ru/index.php/Duty:%D0%94%D0%B5%D0%B6%D1%83%D1%80%D1%81%D1%82%D0%B2%D0%B0',$post);
//$url = str_get_html($url);
//print_r($url);

$user->logFile('fff');
$html=$url;//file_get_contents("http://wiki.standart-n.ru/index.php/Duty:%D0%94%D0%B5%D0%B6%D1%83%D1%80%D1%81%D1%82%D0%B2%D0%B0");
$delstr='<!DOCTYPE html>';
$html=str_replace($delstr,'',$html);
$delstr='<link rel="stylesheet" href="http://wiki.standart-n.ru/load.php?debug=false&amp;lang=ru&amp;modules=mediawiki.legacy.commonPrint%2Cshared%7Cmediawiki.skinning.interface%7Cmediawiki.ui.button%7Cskins.vector.styles&amp;only=styles&amp;skin=vector&amp;*" />';
$insstr='<link rel="stylesheet" href="http://wiki.standart-n.ru/load.php?debug=false&amp;lang=ru&amp;modules=mediawiki.legacy.commonPrint%2Cshared%7Cmediawiki.skinning.interface&amp;only=styles&amp;skin=vector&amp;*" />';
$html=str_replace($delstr,$insstr,$html);

$delstr='<div class="printfooter">';
$insstr='<!--<div class="printfooter">';
$html=str_replace($delstr,$insstr,$html);

$delstr='<!-- Yandex.Metrika counter --><script';
$insstr='--><!-- Yandex.Metrika counter --><script';
$html=str_replace($delstr,$insstr,$html);




echo "<div class='container'>";

echo $html;
echo "</div";
