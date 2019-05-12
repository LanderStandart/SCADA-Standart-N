<?php
include('header.php');
$url=R::getAll('SELECT id,nameserver,url FROM SERVERNAME ');
echo'<div class="row" style="min-height:1rem"> </div>';
echo '<div class="row" >';
echo '<div class="col-3" style="font-size: 1.2rem;">Список серверов:<br></div>';
echo '<div class="col-8">';
echo'<div class="table">';
echo '<table class="table">';
 foreach ($url as $row){
//while ($row=mysqli_fetch_row($url)) {
	echo '<tr class="profile" >';
	echo '<td class="profID" style="width:5%">'.$row['id'].'</td>';
	echo '<td  style="width:25%">'.$row['nameserver'].'</td>';
	echo '<td  style="width:70%">'.$row['url'].'</td>';
	echo'<td><a  href=""> <button data-toggle="modal" data-target="#EditServ" type="button" style="padding:unset" name="'.$row['id'].'" class="btn btn-outline-light"><img src="./images/edit.png" width=15px  </button></a></td>';
	echo '</tr>';}
echo'</table></div>';
?>


