<?php
include_once("declare1.php");

class userclass{
var $pass='AYJXS-wlubj-4ami-5uvo-ksbzn';
var $user='partner15339';
var $result;
 var $db;
  var $default_trn;	


function ftpPartner($user,$pass){
$open = ftp_connect("partner.melzdrav.ru", 21, 90);
if (!ftp_login($open, $user, $pass)) exit("Не могу соединиться");	
ftp_pasv($open, true);

if (!ftp_chdir($open, "/cp_list/")) exit("Нет нужной папки");

$files = ftp_nlist($open, "."); // Получаем список файлов из текущей директории
  for ($i = 0; $i < count($files); $i++) {
  	$local_file='C:\\Standart-n\\Partner\\'.$files[$i];
		if (!ftp_get($open, $local_file, $files[$i], FTP_BINARY)) exit ("Нет файлов в директории");
		$this->Unzip($local_file);
    echo $files[$i]."<br>"; // Выводим все полученные файлы
}
 ftp_close($open);
}	
function Unzip($files){
	$zip = new ZipArchive(); //Создаём объект для работы с ZIP-архивами
  //Открываем архив archive.zip и делаем проверку успешности открытия
  if ($zip->open($files) === true) {
    $zip->extractTo("C:\\Standart-n\\Partner\\"); //Извлекаем файлы в указанную директорию
    $zip->close(); //Завершаем работу с архивом
  }
  else echo "Архива не существует!"; //Выводим уведомление об ошибке
}
function dbconnect(){
	 $this->db = ibase_connect('localhost:E:\\base\\ztrade.FDB', 'SYSDBA', 'masterkey') or die("db connect error " . ibase_errmsg());
	$this->default_trn = ibase_trans(IBASE_WRITE + IBASE_COMMITTED + IBASE_REC_VERSION + IBASE_NOWAIT, $this->db) or die(" error start transaction".ibase_errmsg());
}
function query($trn, $sql){
  if ($trn==0){$trn=$this->default_trn;}
  return ibase_query($trn,$sql) or die(" error prepare ".ibase_errmsg()."(".$sql.")");
//  $res = ibase_execute($q,$_POST["MACHINEUUID"],$_POST["SHIFT_ID"]) or die(" error exec ".ibase_errmsg()."(".$sql.")");
}

function ReadCSV($user){
	$this->dbconnect();
	$s='DELETE FROM OUT$PARTNER';
	$s=ibase_prepare($s);
	ibase_execute($s);
	
	$s='ALTER SEQUENCE GEN_OUT$PARTNER_ID RESTART WITH 0';
	$s=ibase_prepare($s);
	ibase_execute($s);

 	$files=("C:\\Standart-n\\Partner\\");
 	$file=$files.str_replace('partner', '',$user);
			$f = fopen($file.'.cpl', "rt") or die("Ошибка!");
			for ($i=0; $data=fgetcsv($f,1000,";"); $i++) {
			     $num = count($data);
		     $this->query($this->default_trn,"INSERT INTO OUT\$PARTNER (BARCODE,SNAME,PARTNER_ID) values ('".$data[9]."','".$data[2]."',".str_replace('partner', '',$user).")");
		    
		}
		fclose($f);
	ibase_commit($this->default_trn);
    
 	}

}

