<?php
$GLOBALS["DB_DATABASENAME"]="localhost:e:\\base\\ZTRADE.FDB";
$GLOBALS["DB_USER"]="SYSDBA";
$GLOBALS["DB_PASSWD"]="masterkey";
class userclass{
function db_init(){
    session_start();
    $this->db = ibase_connect($GLOBALS["DB_DATABASENAME"], $GLOBALS["DB_USER"], $GLOBALS["DB_PASSWD"]) or die("db connect error " . ibase_errmsg());
	$this->default_trn = ibase_trans(IBASE_WRITE + IBASE_COMMITTED + IBASE_REC_VERSION + IBASE_NOWAIT, $this->db) or die(" error start transaction".ibase_errmsg());
//	unlink("test.mdr");
	
  }

function getData($data_start,$data_end,$gprofile){
$sql="select
    w.id,w.sname||' '||replace(vizg.svalue,'\"','')as SNAME,
    replace(cast(p.price_o as numeric(9,2)),',','.') as price_o,
    replace(cast(p.price as numeric(9,2)),',','.') as price,
    (select replace(cast(sum(d.quant)as numeric(9,2)),',','.') from doc_detail d
    where d.part_id=r.part_id and d.doc_commitdate between '".$data_start."' and '".$data_end."'
     and d.g\$profile_id=r.g\$profile_id) as ost_end,

    (select replace(coalesce(cast(sum(d.quant)as numeric(9,2)),0),',','.') from doc_detail d where d.part_id=r.part_id and d.doc_commitdate between '".$data_start."' and '".$data_end."' and d.doc_id=
        (select docs.id from docs where docs.doc_type=1 and docs.id=r.doc_id and docs.g\$profile_id=r.g\$profile_id)and d.g\$profile_id=r.g\$profile_id)as prihod,
     (select replace(coalesce(cast(abs(sum(d.quant))as numeric(9,2)),0),',','.') from doc_detail d where d.part_id=r.part_id and d.doc_commitdate between '".$data_start."' and '".$data_end."' and d.doc_id=
        (select docs.id from docs where docs.doc_type=3 and docs.id=r.doc_id and docs.g\$profile_id=r.g\$profile_id)and d.g\$profile_id=r.g\$profile_id)as rashod
    from
    (select dd.part_id,dd.doc_id, dd.g\$profile_id from doc_detail dd
     left join docs on docs.id=dd.doc_id
        where dd.doc_commitdate between '".$data_start."' and '".$data_end."' and docs.doc_type in (1,3)) r
left join parts p on p.id=r.part_id  and p.g\$profile_id=r.g\$profile_id
left join wares w on w.id=p.ware_id
left join vals vizg on vizg.id=w.izg_id
where r.g\$profile_id=".$gprofile;
print_r($sql);	
$text='';	
$trn=ibase_query($this->default_trn,$sql);
while($res=ibase_fetch_object($trn)){
 
 $text=$res->ID."\t".$res->SNAME."\t".$res->OST_END."\t".$res->PRIHOD."\t".$res->PRICE_O."\t".$res->RASHOD."\t".$res->PRICE."\t".$data_start."\t".$data_end."\n";
 $text=iconv("windows-1251", "utf-8",$text);
 $this->CreateFile($text);	
}


}  

function CreateFile($text){
 $fp=fopen("test.mdr", "a");
 fwrite($fp,$text);
 fclose($fp);
}


}

?>