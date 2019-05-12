<?php
function GetOZClient($id,$ed){
  //$id=$_GET['cid'];
  $edit='readonly';
 // if ($ed==0){
  if ($ed!=='qq'){
     $edit='readonly';}
  else {$edit='';}//}
     $html_clients=file_get_contents("./tmpl/oz_client_detail.php");
     $clients=R::getAll('SELECT name,iin,address,email,status,p_id,id FROM OZ_CLIENTS where id='.$id);
     foreach($clients as $row){
     //while ($row=mysqli_fetch_row($clients)) {
        $html_clients=str_replace(":=row6=:",$row['id'],$html_clients);
        $html_clients=str_replace(":=row5=:",$row['p_id'],$html_clients);$server=$row['p_id'];
         $html_clients=str_replace(":=row0=:",$row['name'],$html_clients);
        $html_clients=str_replace(":=row1=:",$row['iin'],$html_clients);$inn=$row['iin'];
        $html_clients=str_replace(":=row2=:",$row['address'],$html_clients);$city=$row['address'];
         $html_clients=str_replace(":=row3=:",$row['email'],$html_clients);
        $html_clients=str_replace(":=row4=:",$row['status'],$html_clients);
        $html_clients=str_replace(":=id=:",$row['id'],$html_clients);
        };
      if ($edit=='readonly'){
          $html_clients=str_replace(":=button=:",'<tr class="profID"><td><a href="./oz_client.php?id='.$server.'"><button class="btn btn-dark" type="button" id="back" ><< Назад</button></a>
            </td>
            <td><a href="./oz_client_sup_list.php?inn=:=iin=:&city=:=city=:"><button class="btn btn-dark" type="button" id="back">Поставщики </button></a></td>
            <td><input class="btn btn-dark" id="edit" type="button" value="Редактировать"> </td></tr>',$html_clients);
          $html_clients=str_replace(":=edit=:",$edit,$html_clients);
          $html_clients=str_replace(":=city=:",$city,$html_clients);
          $html_clients=str_replace(":=iin=:",$inn,$html_clients); }
      else{
          $html_clients=str_replace(":=button=:",'<tr ><td><button class="btn btn-dark" type="button" id="back" ><< Назад</button>
            </td><td><button class="btn btn-dark" type="submit">Сохранить</button>
                         </td></tr>',$html_clients);
          $html_clients=str_replace(":=edit=:",$edit,$html_clients);

          }
           
     print_r($html_clients);
  }
  function AddOZClient($id,$ed){

  $edit='';
     $html_clients=file_get_contents("./tmpl/oz_client_detail.php");
     $clients=R::getAll('SELECT name,iin,address,email,status,p_id,id FROM OZ_CLIENTS where id='.$id);
    // while ($row=mysqli_fetch_row($clients)) {
     foreach($clients as $row){
        $html_clients=str_replace(":=row6=:",'',$html_clients);
        $html_clients=str_replace(":=row5=:",$id,$html_clients);
         $html_clients=str_replace(":=row0=:",$row['name'],$html_clients);
        $html_clients=str_replace(":=row1=:",$row['iin'],$html_clients);
        $html_clients=str_replace(":=row2=:",$row['address'],$html_clients);
         $html_clients=str_replace(":=row3=:",$row['email'],$html_clients);
        $html_clients=str_replace(":=row4=:",$row['status'],$html_clients);
        $html_clients=str_replace(":=id=:",'12',$html_clients);
        };
      
          $html_clients=str_replace(":=button=:",'<tr ><td></td><td><button class="btn btn-dark" type="submit">Сохранить</button>
                         <button class="btn btn-dark" type="button" id="back" ><< Назад</button></td></tr>',$html_clients);
          $html_clients=str_replace(":=edit=:",$edit,$html_clients);  
          
           
     print_r($html_clients);
  }


?>