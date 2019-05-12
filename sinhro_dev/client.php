<!--Формируем страницу вывода данных-->
<?php 

//require('./engine/user.lib.php');
//$user = new userclass();
// $user->init();  
?> 
<div id="content" >
<!-- <div class="row" style="min-height:1rem">

 </div> -->
<div class="row" style="min-height:15rem" >
  <div class="col-3" style="font-size: 1.2rem;">
    <div>Время обновления данных:</div>
    <div style="word-wrap: break-word;font-size:1rem"> <?php  needUPD() ?> </div>
  </div>
  <div class="col-8">

    <div class="table">
      <div id="client" class="table-row">
        
         <?php    
        
        if (isset($_GET['sort'])) {$sort=$_GET['sort'];}else {$sort='sort';}
         GetClient($sort); ?>
           
        
      
      </div>
    </div>
  </div> 
</div>
<div style="width:100%"><hr></div> 

</div>


