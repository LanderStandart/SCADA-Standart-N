<?php
 function Malohod(){  
   $malohod=R::getCell('SELECT COUNT(id) FROM MALOHOD where CAST(dt as Date)<CURRENT_DATE');
   if ($malohod!=0){$count=$malohod;}else {$count='';}
   return $count;
 }
 function ListServ($sort,$where){
  return R::getAll('SELECT nameserver,status,sort,id FROM SERVERNAME '.$where.' ORDER BY '.$sort);
 }
 
function SumVIP($profile){
  return R::getCell('SELECT SUM(vip) FROM SINHRO WHERE vip is not null and idserv="'.$profile.'"');
}

function CountFlag($profile){
  return R::getCell('SELECT count(flag) FROM SINHRO WHERE  idserv='.$profile.' and (SELECT status FROM SIN_STAT_PROFILES where SIN_STAT_PROFILES.idserv=SINHRO.idserv and SIN_STAT_PROFILES.profile_id=SINHRO.profile_id)=0');
}

//OR ($this->CountFlag($row[3])>0)
function CountServ($profile){
  return R::getCell('SELECT count(flag) FROM SINHRO WHERE  idserv='.$profile.'');
}
function CheckServ($id){
  return R::getCell('SELECT status FROM SERVERNAME WHERE  id='.$id.'');
}

function CheckProfile($idserv,$profile){
  return R::getCell('SELECT status FROM SIN_STAT_PROFILES WHERE  idserv='.$idserv.' and profile_id='.$profile.'');
}

function CorrStr($string) {
 $string=str_replace("\"", "", $string);
 return $string;
 }

function GetClient($sort){
   if ($sort=='sorte')
    {
      $sql=$this->ListServ('status,sort','where status<>1 or sort<>10');}
    elseif($sort=='abce')
      {$sql=$this->ListServ('nameserver','where status<>1 or sort<>10');} 
    elseif($sort=='abc')
      {$sql=$this->ListServ('nameserver','');}
    else {$sql=ListServ('status,sort','');}

	foreach ($sql as $clients) {
      $timeok=0;$timedead=0;$time=0;$err=0;$timeok1=0;$ps=0;
      $vip=SumVIP($clients['id']);
      if ($vip>0) {$str=';background-color: #ffd6d6';} else {$str='';} //Если ошибка на профиле со статусом ВИП
      if (($clients['status']==0) ) {$str=$str.';border-color: #ef0a1b;border-width: .1rem;';} else {$str=$str.'';} //нет связи с сервером
      if (CountFlag($clients['id'])>0){$count=CountFlag($clients['id']);} else {$count='';}
    echo '<a href="./profiles.php?id='.$clients['id'].'" <button class="btn btn-outline-dark" style="width:155px;margin:3px'.$str.'"><div>'.ServNameShort($clients['nameserver']).'</div>';
        if ($clients['id']==1){
          $diff_min=R::getCell('SELECT diff_min from SIN_LLT where prof_id='.$clients['id']);
        if ($diff_min>30){echo '<img src=./images/llt.png class="icon-status" style="width:.7rem">';}
        }

  if (($clients['status']>0) and ($clients['sort']<10)){
  $stat=R::getAll('SELECT flag,data from SINHRO where idserv='.$clients['id'].' and (SELECT status FROM SIN_STAT_PROFILES where SIN_STAT_PROFILES.idserv=SINHRO.idserv and SIN_STAT_PROFILES.profile_id=SINHRO.profile_id)=0');
   foreach ($stat as $row) {
     if (($row['flag']>0)and (CountFlag($clients['id'])>0) ){
                  $lastpackretdate=new \DateTime ($row['data']); 
                  $currentdate=Currentdate();      
                  $diff=$currentdate->diff($lastpackretdate); 
                  $per=$diff->days;
                  $hour=$diff->h;
                //  echo $per.'--'.$hour.'*';
                  if (($per<1)and($timeok==0) and ($hour<3)){echo '<img src=./images/timeok.png class="icon-status">';$timeok=1;}
                  elseif (($per<=1)and($timeok1==0) and ($hour>=3)){echo '<img src=./images/timeok1.png class="icon-status">';$timeok1=1; }
                  elseif (($per>1) and ($per<7)and ($time==0)){echo '<img src=./images/time.png class="icon-status">';$time=1;}
                  elseif (($per>=7)and ($timedead==0)){echo '<img src=./images/timedead.png class="icon-status">';$timedead=1;}
                }
     if (($row['flag']== -1)and $err==0){echo '<img src=./images/err.png class="icon-status">';$err=1;}
                }
}elseif ($clients['status']==0) {echo '<img src=./images/errserv.jpg class="icon-status">';$ps=1;} elseif ($clients['sort']==10) {echo '<img src=./images/ok.jpg class="icon-status">';$ps=1;}
if ((CountFlag($clients['id'])==0)and ($ps==0)) {echo '<img src=./images/ok.jpg class="icon-status">';
$sql1='UPDATE SERVERNAME set SORT=10 where id='.$clients['id'];
$dd=R::exec($sql1);}

echo '<span class="badge badge-light">'.$count.'</span></button></a>';

}  }
?>