<?php include('./header.php'); ?>

<div id="cntnt">
  <div class="row" style="min-height:1rem"> </div>
  <div class="row" style="min-height:15rem">
    <div class="col-3" style="font-size: 1.2rem;">
      <div>Поставщики:</div> 
    </div>
  <div class="col-4">Получаем данные с серверов поставщиков </div>
  <div class="col-4">
    <div id="p_prldr"><div class="contpre"><span class="svg_anm"></span><img src="./images/load.gif"></div></div>
  </div>
 </div>   

<?php
$inn=$_GET['inn'];
$city=$_GET['city'];
$url="./oz_cl_sp_load.php?inn=".$inn."&city=".$city;


?>
<script type="text/javascript">$(window).on('load', function () {
  document.location.href = <?php echo '"'.$url.'"' ?>;
});</script>


