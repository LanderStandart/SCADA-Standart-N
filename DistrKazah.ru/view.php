<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$inn = $_POST['inn'];
	$adres = $_POST['adres'];
	$city = $_POST['city'];
}

//коды городов по поставщикам
if ($city=='Алматы') {$sklad = array("medservice"=>"1020","inkar"=>"1001","amanat"=>"001","stofarm"=>"003");}
if ($city=='Актау') {$sklad = array("medservice"=>"1001","inkar"=>"1010","amanat"=>"","stofarm"=>"001");}
if ($city=='Актобе') {$sklad = array("medservice"=>"1002","inkar"=>"1012","amanat"=>"","stofarm"=>"002");}
if ($city=='Астана') {$sklad = array("medservice"=>"1003","inkar"=>"1002","amanat"=>"","stofarm"=>"004");}
if ($city=='Атырау') {$sklad = array("medservice"=>"","inkar"=>"1003","amanat"=>"","stofarm"=>"005");}
if ($city=='Актюбинск') {$sklad = array("medservice"=>"","inkar"=>"","amanat"=>"002","stofarm"=>"");}
if ($city=='Балхаш') {$sklad = array("medservice"=>"","inkar"=>"","amanat"=>"","stofarm"=>"006");}
if ($city=='Есик') {$sklad = array("medservice"=>"","inkar"=>"1004","amanat"=>"","stofarm"=>"007");}
if ($city=='Караганда') {$sklad = array("medservice"=>"1005","inkar"=>"1005","amanat"=>"011","stofarm"=>"008");}
if ($city=='Кокшетау') {$sklad = array("medservice"=>"1006","inkar"=>"","amanat"=>"004","stofarm"=>"009");}
if ($city=='Костанай') {$sklad = array("medservice"=>"1007","inkar"=>"1006","amanat"=>"005","stofarm"=>"011");}
if ($city=='Кызылорда') {$sklad = array("medservice"=>"1008","inkar"=>"","amanat"=>"","stofarm"=>"012");}
if ($city=='Павлодар') {$sklad = array("medservice"=>"1009","inkar"=>"1009","amanat"=>"006","stofarm"=>"013");}
if ($city=='Петропавловск') {$sklad = array("medservice"=>"1010","inkar"=>"","amanat"=>"007","stofarm"=>"014");}
if ($city=='Семей') {$sklad = array("medservice"=>"1011","inkar"=>"1007","amanat"=>"","stofarm"=>"015");}
if ($city=='Семипалатинск') {$sklad = array("medservice"=>"","inkar"=>"","amanat"=>"008","stofarm"=>"");}
if ($city=='Тылдыкорган') {$sklad = array("medservice"=>"1012","inkar"=>"1013","amanat"=>"","stofarm"=>"018");}
if ($city=='Тараз') {$sklad = array("medservice"=>"1013","inkar"=>"","amanat"=>"","stofarm"=>"019");}



$medservice1=file_get_contents('https://online.medservice.kz/viortis/service.php?secret=standartnruik711mj4L3oCjwcKie3x8&city_id='.$sklad['medservice'].'&type=CLIENT&BIN='.$inn);
$medserviceS1=file_get_contents('https://online.medservice.kz/viortis/service.php?secret=standartnruik711mj4L3oCjwcKie3x8&city_id=1010&type=CLIENT&BIN='.$inn);
$adres=mb_strtolower($adres);
$medservice = simplexml_load_string($medservice1);

$medservices = simplexml_load_string($medserviceS1);
$inkar = simplexml_load_file('http://2.133.92.203:53000//HttpAdapter/HttpMessageServlet?interfaceNamespace=urn:krs:onlineKab:ERP:AddressDelivery&interface=si_AddressDelivery_Site_sync_out&senderService=BC_Site&qos=BE&j_username=Site&j_password=2NaJWlNI&sap-language=EN&RNN=111&BIN='.$inn.'&XML=%3C?xml%20version=%221.0%22%20encoding=%22UTF-8%22?%3E%20%3Cns0:mt_AddressDelivery_req%20xmlns:ns0=%22urn:krs:ERP:Wiedmann:AddressDelivery%22%3E%20%3C/ns0:mt_AddressDelivery_req%3E');
$amanat_doc=simplexml_load_file('http://api.amanat.kz/?secret=4a98f4c4be0e11e5afbf001e67922ec1&type=CONTRACTS&BIN='.$inn);
$amanat_clients =simplexml_load_file('http://api.amanat.kz/?secret=4a98f4c4be0e11e5afbf001e67922ec1&type=CLIENT&BIN='.$inn); 
$stofarm_doc = simplexml_load_file('http://api.stopharm.kz/provisor?secret=9fc94a07f87e2816ee5722ad7517a9ce&type=contracts&BIN='.$inn); 
$stopharm_clients = simplexml_load_file('http://api.stopharm.kz/provisor?secret=9fc94a07f87e2816ee5722ad7517a9ce&type=CLIENT&BIN='.$inn); 

echo "БИН/ИИН клиента - ".$inn.'<br>';
echo "Адрес клиента -".$adres.'<br>';
echo "------------------------------------<br>";

echo '<br>'."Инкар:".'<br>';
//Парсим ответ от сервера Инкар
foreach ($inkar as $clients) {
	# code...
	foreach ($clients as $client) {

		foreach ($client->address as $adr) {
		   $pos = stripos(mb_strtolower($adr), $adres);
		   if ($pos!==false) {echo $client->id.'<br>'.$client->address.'<br>'.$sklad['inkar'].'|'.$inn.'|'.$client->id.'<br>';}	
		}}}
echo '<br>'."Медсервис:".'<br>';
echo "Головной:".'<br>';
//Парсим ответ от сервера Медсервис
foreach ($medservices as $clients) {
	# code...
	foreach ($clients as $client) {

		foreach ($client->address as $adr) {
		   echo $sklad['medservice'].'|'.str_replace('ID','', $client->id) .'<br>';
		}}}
echo "Точка:".'<br>';
foreach ($medservice as $clients) {
	# code...
	foreach ($clients as $client) {

		foreach ($client->address as $adr) {
		   $pos = stripos(mb_strtolower($adr), $adres);
		   if ($pos!==false) {echo $client->id.'<br>'.$client->address.'<br>'.$sklad['medservice'].'|'.$client->id.'<br>';}	
		}}}

//Парсим ответ от сервера Аманат
echo '<br>'."Аманат:".'<br>';		
	   $amanat_doc_id = $amanat_doc->contracts->contract->id;
		
foreach ($amanat_clients as $clients) {
	# code...
	foreach ($clients as $client) {

		foreach ($client->address as $adr) {
		   $pos = stripos(mb_strtolower($adr), $adres);
		   if ($pos!==false) {echo $adr.'<br>'.$amanat_doc_id.'|'.$client->id.'|'.$sklad['amanat'].'<br>';}	
		}}}
//Парсим ответ от сервера СтоФарм
echo '<br>'."Стофарм:".'<br>';		
	   $stofarm_doc_id = $stofarm_doc->contracts->i['id'];

foreach ($stopharm_clients as $clients) {
	# code...
	foreach ($clients as $client) {

		foreach ($client->address as $adr) {
		   $pos = stripos(mb_strtolower($adr), $adres);
		   if ($pos!==false) {echo $stofarm_doc_id.'|'.$client->id.' - номер прайса '.$sklad['stofarm'].' <br>';}	
		}}}





