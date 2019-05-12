<?php
 include('./header.php');
echo'<div class="row" style="min-height:1rem"> </div>';

echo '<div class="row" style="min-height:15rem" >';
echo '<div class="col-3" style="font-size: 1.2rem;">';
echo '<div>Клиенты:</div> </div> ';

echo '<div class="col-8" >';
echo'<div class="table-row" >';

$clients=R::getall('SELECT name,id FROM OZ_CLIENTS where p_id =999');


//while ($row=mysqli_fetch_row($clients)) {
  foreach ($clients as $row){
		echo '<a href=./oz_client.php?id='.$row['id'].'><button  class="btn btn-outline-dark" style="width:150px;margin:3px">'.$row['name'].'</button></a>';
  }


echo '
</div></div></div><div class="row" style="min-height:1rem">
<div class="col-3"> </div>
<div class="col-8">
	<button class="btn btn-dark" data-toggle="modal" data-target="#myModal1" type="submit">Добавить</button> 
</div>
 </div>
<div class="row" style="min-height:1rem"> </div> ';


//include('./engine/footer.php');


?>
 <div class="modal" id="myModal1">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Добавление нового Получателя</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!-- Modal body -->
                <form action="./add_oz_client.php" method="post">
                  <div class="modal-body">
                  
                      <div class="form-group">
                        <label for="nameserver">Наименование:</label>
                        <input type="nameserver" class="form-control" name="nameserver" id="nameserver">
                      </div>
                      <!-- <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="url" class="form-control" name="url" id="url">
                      </div> -->
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

<script type="text/javascript"> 
            
      $('#Update').on('show.bs.modal', function() {
       
        document.location.href = "./getdata.php";
  
      })
</script>          