<?php
//include_once("declare.php");

class userclass{
	var $diff_status;
	var $db;
	var $default_trn;

function check_domain_availible($domain)
  {
  if (!filter_var($domain, FILTER_VALIDATE_URL))
    return false;

  $curlInit = curl_init($domain);
  
  curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curlInit, CURLOPT_HEADER, true);
  curl_setopt($curlInit, CURLOPT_NOBODY, true);
  curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
  $code=11;
  $response = curl_exec($curlInit);
  if (!curl_errno($curlInit)){ $code = curl_getinfo($curlInit,CURLINFO_HTTP_CODE);}

  curl_close($curlInit);
  
  if (($response)and($code!==404))
   //if ($response)
    return true;
  return false;
  }

function ConnectFirebirdSQL(){
	include_once('declare.php');
	$this->db = ibase_connect(iconv('utf-8', 'windows-1251', $GLOBALS["DB_DATABASENAME"]), $GLOBALS["DB_USER"], $GLOBALS["DB_PASSWD"]) or die("db connect error " . ibase_errmsg());
	$this->default_trn = ibase_trans(IBASE_WRITE + IBASE_COMMITTED + IBASE_REC_VERSION + IBASE_NOWAIT, $this->db) or die(" error start transaction".ibase_errmsg());
}  

function GetDiff($date_start,$date_end){
	// $date_start=new \DateTime ($date_start);
	// $date_end=new \DateTime ($date_end);
	
	$date_start->settimezone(new DateTimeZone('Europe/Samara'));
	$date_end->settimezone(new DateTimeZone('Europe/Samara'));
	$diff=($date_start->diff($date_end));
	$this->diff_d=$diff->days;
    $this->diff_h=$diff->h;
    $this->diff_m=$diff->i;
    if (($this->diff_d>0)or($this->diff_h>0)or($this->diff_m>0)){
    	$this->diff_status=1;}else{$this->diff_status=0;}
    return 	$this->diff_status;
}

function GetUPDSQL (){//проверяем неободимость обновления запроса с сервера
//передаем запрос куда идет выгрузка id-recipient, queryid- ид запроса 
	$xml= simplexml_load_file('http://192.168.67.62:8080/expserver/query.php');
	$insertdt=$xml->insertdt->__toString();
		print_r($insertdt);
	$insertdt = new \DateTime ($insertdt);
	$currdate=new \DateTime (date ("Y-m-d H:i:s"));
	print_r($this->GetDiff($currdate,$insertdt));
    if ($this->GetDiff($currdate,$insertdt)==1){
       $query=$xml->query;
       $query=str_replace("'", "''", $query);
       $this->ConnectFirebirdSQL();
      // $sql="INSERT INTO L_EXP_PARAMS (QUERY_VAL) values ('".$query."'); ";
       $sql="UPDATE L_EXP_PARAMS set QUERY_VAL='".$query."'";
       ibase_query($this->default_trn,$sql);
       ibase_commit($this->default_trn);
   		print_r('Обновили запрос<br>');}
}
 function GetExData($date_start,$date_end,$gprofile){
 	$this->ConnectFirebirdSQL();
 	$sql= "SELECT QUERY_VAL from L_EXP_PARAMS";
 	$query=ibase_query($this->default_trn,$sql);
 	$query=ibase_fetch_row($query);
 	
 	$sql=$query[0];
 	$sql=str_replace('".$data_start."', $date_start, $sql);
 	$sql=str_replace('".$data_end."', $date_end, $sql);
	$sql=str_replace('".$gprofile', $gprofile, $sql);
 	
 	$result=ibase_query($sql);
 	//$trn=ibase_fetch_row($result);
 	while($res=ibase_fetch_object($result)){
 
 $text=$res->ID."\t".$res->SNAME."\t".$res->OST_END."\t".$res->PRIHOD."\t".$res->PRICE_O."\t".$res->RASHOD."\t".$res->PRICE."\n";
 $text=iconv("windows-1251", "utf-8",$text);
 print_r($text);}
 	//print_r(iconv('windows-1251','utf-8', $result[1]));
 }

}
?>