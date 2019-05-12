<?php
function check_domain_availible($domain)
  {
  if (!filter_var($domain, FILTER_VALIDATE_URL))
    return false;

  $curlInit = curl_init($domain);
  
  curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curlInit, CURLOPT_TIMEOUT, 15);
  curl_setopt($curlInit, CURLOPT_HEADER, true);
  curl_setopt($curlInit, CURLOPT_NOBODY, true);
  curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
  $code=11;
  $response = curl_exec($curlInit);
  if (!curl_errno($curlInit)){ $code = curl_getinfo($curlInit,CURLINFO_HTTP_CODE);}

  curl_close($curlInit);
  
  if (($response)and($code!==404)and ($code!==502))
   //if ($response)
    return true;
  return false;
  }

function getData ($profile_id=0)
{
//Проверка не запущен ли процесс обновления данных
$update=R::getrow('SELECT updatenow,lastupdate from UPDATE_TIME');	
$updatenow=$update['updatenow'];//active script
$lastupdate=$update['lastupdate'];

$currentdate=currentdate();
$lastupdate=new \DateTime ($lastupdate);
$sleep=$currentdate->diff($lastupdate);
//print_r($sleep->i);print_r($lastupdate);print_r(currentdate());
if ($sleep->i>20){R::exec('UPDATE UPDATE_TIME set updatenow=0');$updatenow=0; }//сбрасываем статус активен если ему больше 20 минут
if ($updatenow!==1){
	if ($profile_id==0){$SQL='SELECT status,url,id,nameserver from SERVERNAME';} else {$SQL='SELECT status,url,id,nameserver from SERVERNAME where id='.$profile_id;}
	$links= R::getall($SQL);//Получаем список адресов для опроса состояния если передан 0 до проверяем все в другом случае только выбранный
	foreach ($links as $row){
		logFile('-----------------------------------');
		logFile('Start UPDATE');
		R::exec('DELETE FROM SINHRO_TMP WHERE idserv='.$row['id']);
		logFile('Clear DATA from SINHRO_TMP => OK');
		$available=check_domain_availible($row['url']);
		$url=$row['url'];
		if ($available!==FALSE){
			$xml=simplexml_load_file($row['url']);//получаем ответ от сервера
			if (isset($xml->nameserver)){
				$nameserver=$xml->nameserver;
         		$timeserver=$xml->timeserver;
         		R::exec('UPDATE SERVERNAME set sort=10, status=1,timeserver="'.$timeserver.'" where id="'.$row['id'].'"');//Ставим статус сервер=доступен сортировка=без ошибок
         		foreach ($xml as $profile) {
              		if ($profile->id >0) {
                  		$timeserv=new \DateTime ($profile->date);
                  		$timeserv->settimezone(new DateTimeZone('Europe/Samara'));
                  		$diff1=($currentdate->diff($timeserv));
      					$diff1=$diff1->days;
      					 //Cортировка по времени последнего пакета
                  		$sprofile=str_replace("\"", "", $profile->sprofile);
                  		$sort=10;
                  		if ($profile->flag<0){$sort=2;} 
                  		elseif (($diff1>30)and ($sort>8)) {$sort=9;} 
                  		elseif (($diff1>7)and ($sort>6)) {$sort=6;}
                  		elseif (($diff1>=1)and ($sort>3)) {$sort=3;} 
                  		elseif ($diff1<1){$sort=5;} 
                  		if ($profile->vip){$vip=$profile->vip;}else {$vip=0;}
                  		$command="INSERT INTO SINHRO_TMP  (data,nameserver,timeserver,profile_id,profile_name,flag,url,status,sort,vip,idserv) VALUES (\"".$profile->date."\",\"".$nameserver."\",\"".$timeserver."\",".$profile->id.",\"".$sprofile."\",".$profile->flag.",\"".$url."\",\"".$profile->status."\",".$sort.",".$vip.",".$row['id'].")";
                  		R::exec($command);
                  		
                  	}
                }
            }
      logFile('Clear SINHRO');
      R::exec("DELETE FROM SINHRO WHERE idserv=".$row['id']);
      logFile('Insert new data in SINHRO');
      R::exec('INSERT INTO SINHRO (profile_id,profile_name,nameserver,timeserver,data,flag,sort,vip,url,status,idserv) SELECT profile_id,profile_name,nameserver,timeserver,data,flag,sort,vip,url,status,idserv FROM SINHRO_TMP where idserv='.$row['id']); 
      logFile('ALL OK DATA RECEIVE SUCCESS ');
      
		}
    else{
        logFile('not complite - ERROR- SERVER Unavailable');
        $command="UPDATE SERVERNAME set status=0, sort=2 where url='".$url."' ; ";
        R::exec($command);}
    logFile('End GetDate');
	}
}	



header("Location:./index.php");
}


?>