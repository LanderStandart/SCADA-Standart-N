<?php
include('./header.php'); 

$inn=$_GET['inn'];
$city=$_GET['city'];
//$db=$user->db;

//коды городов по поставщикам
if ($city=='Алматы') {$sklad = array("medservice"=>"1020","inkar"=>"1001","amanat"=>"001","stofarm"=>"003","zerde"=>"almaty");}//
if ($city=='Актау') {$sklad = array("medservice"=>"1001","inkar"=>"1010","amanat"=>"","stofarm"=>"001");}//
if ($city=='Актобе') {$sklad = array("medservice"=>"1002","inkar"=>"1012","amanat"=>"","stofarm"=>"002","zerde"=>"aktobe");}//
if ($city=='Астана') {$sklad = array("medservice"=>"1003","inkar"=>"1002","amanat"=>"","stofarm"=>"004","zerde"=>"astana");}
if ($city=='Атырау') {$sklad = array("medservice"=>"","inkar"=>"1003","amanat"=>"","stofarm"=>"005");}
if ($city=='Актюбинск') {$sklad = array("medservice"=>"","inkar"=>"","amanat"=>"002","stofarm"=>"");}
if ($city=='Балхаш') {$sklad = array("medservice"=>"","inkar"=>"","amanat"=>"","stofarm"=>"006");}
if ($city=='Есик') {$sklad = array("medservice"=>"","inkar"=>"1004","amanat"=>"","stofarm"=>"007");}
if ($city=='Караганда') {$sklad = array("medservice"=>"1005","inkar"=>"1005","amanat"=>"011","stofarm"=>"008","zerde"=>"karaganda");}
if ($city=='Кокшетау') {$sklad = array("medservice"=>"1006","inkar"=>"","amanat"=>"004","stofarm"=>"009");}
if ($city=='Костанай') {$sklad = array("medservice"=>"1007","inkar"=>"1006","amanat"=>"005","stofarm"=>"011");}
if ($city=='Кызылорда') {$sklad = array("medservice"=>"1008","inkar"=>"","amanat"=>"","stofarm"=>"012");}
if ($city=='Павлодар') {$sklad = array("medservice"=>"1009","inkar"=>"1009","amanat"=>"006","stofarm"=>"013");}
if ($city=='Петропавловск') {$sklad = array("medservice"=>"1010","inkar"=>"","amanat"=>"007","stofarm"=>"014");}
if ($city=='Семей') {$sklad = array("medservice"=>"1011","inkar"=>"1007","amanat"=>"","stofarm"=>"015");}
if ($city=='Семипалатинск') {$sklad = array("medservice"=>"","inkar"=>"","amanat"=>"008","stofarm"=>"");}
if ($city=='Тылдыкорган') {$sklad = array("medservice"=>"1012","inkar"=>"1013","amanat"=>"","stofarm"=>"018");}
if ($city=='Тараз') {$sklad = array("medservice"=>"1013","inkar"=>"","amanat"=>"","stofarm"=>"019");}
if ($city=='Шымкент') {$sklad = array("medservice"=>"1015","inkar"=>"1011","amanat"=>"010","zerde"=>"shymkent","stofarm"=>"017");}

function file_get_contents_curl( $url ) {
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
  curl_setopt( $ch, CURLOPT_HEADER, 0 );
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
  $data = curl_exec( $ch );
  curl_close( $ch );
  return simplexml_load_string($data);
}

function OZ_SUPP_InsertTOBase ($supp_name,$client,$code_oz,$inn)
{
  $command="INSERT INTO OZ_SUPP  (supp_name,client_name,code_oz,inn) VALUES ('".$supp_name."','".$client."','".$code_oz."','".$inn."')
        ON DUPLICATE KEY UPDATE code_oz='".$code_oz."',inn='".$inn."',client_name='".$client."'  ";
       R::exec($command); 
}

function GetSuppData($supp,$sklad,$supp_name,$sup_id,$inn){

  foreach ($supp as $clients) {
  # code...
  foreach ($clients as $client) {

    foreach ($client->address as $adr) {
       if(($sup_id=='medservice')or($sup_id=='inkar')or($sup_id=='zerde')){ $code_oz=$sklad[$sup_id].'|'.$client->id;} 
       else{$code_oz=$sklad.'|'.$client->id;} 
        echo '<tr><td>'.$supp_name.'</td><td>'.$client->address.'</td><td>'.$code_oz.'</td></tr>';
        OZ_SUPP_InsertTOBase($supp_name,$client->address,$code_oz,$inn);      
    }}}
}

function OZ_Get_SUPP_URL($supp_name)
{
 $SQL="Select url,url1,url_suf from SUPPLIERS where name='".$supp_name."'";
 $url=R::getall($SQL);
 foreach ($url as $url_sup){
 //while ($url_sup=mysqli_fetch_row($url)){
  $urls[1]=$url_sup['url'];
  $urls[2]=$url_sup['url1'];
  $urls[3]=$url_sup['url_suf'];
 } 
  return $urls;
}
$url=OZ_Get_SUPP_URL('Медсервис');
$urls=$url[1].$sklad['medservice'].$url[3].$inn;
$medservice=file_get_contents_curl($urls);

$url=OZ_Get_SUPP_URL('Медсервис');
$urls=$url[1].'1010'.$url[3].$inn;
$medservices=file_get_contents_curl($urls);

echo'<div id="cntnt">
  <div class="row" style="min-height:1rem"> </div>
  <div class="row" style="min-height:15rem">
    <div class="col-3" style="font-size: 1.2rem;">
      <div>Поставщики:</div> 
    </div>
  <div class="col-8">
      <div class="table-row">
        <table class="table profile" >
          <tr><th>Поставщики</th><th>Получатель</th><th>Код для Общего заказа</th></tr>
';   

echo '<tr><td>Медсервис</td><td>Головной</td>';

//Парсим ответ от сервера Медсервис
foreach ($medservices as $clients) {
  # code...
  foreach ($clients as $client) {

    foreach ($client->address as $adr) {
       echo '<td>'.$sklad['medservice'].'|'.str_replace('ID','', $client->id) .'</td></tr>';
       
    }}}

GetSuppData($medservice,$sklad,'Медсервис','medservice',$inn);

$url=OZ_Get_SUPP_URL('Инкар');
$urls=$url[1].$inn.$url[3];
$inkar=file_get_contents_curl($urls);
 //Парсим ответ от сервера Инкар
 GetSuppData($inkar,$sklad,'Инкар','inkar',$inn);

//Аманат
$url=OZ_Get_SUPP_URL('Аманат');
$urls=$url[1].$inn;
$amanat_doc=file_get_contents_curl($urls);
$urls=$url[2].$inn;
$amanat_clients=file_get_contents_curl($urls);
//Парсим ответ от сервера Аманат
$amanat_doc_id = $amanat_doc->contracts->contract->id;
GetSuppData($amanat_clients,$amanat_doc_id,'Аманат','amanat',$inn);   

//СтоФарм
$url=OZ_Get_SUPP_URL('Стофарм');
$urls=$url[1].$inn;
$stofarm_doc=file_get_contents_curl($urls);
$urls=$url[2].$inn;
$stopharm_clients=file_get_contents_curl($urls);

$stofarm_doc_id = $stofarm_doc->contracts->i['id'];
GetSuppData($stopharm_clients,$stofarm_doc_id,'СтоФарм','',$inn);

//Зерде
$url=OZ_Get_SUPP_URL('Зерде');
$urls=$url[1].$inn;
$zerde=file_get_contents_curl($urls);
//Парсим ответ от сервера Зерде
GetSuppData($zerde,$sklad,'Зерде','zerde',$inn);    

echo "</table></div></div>
";
?>