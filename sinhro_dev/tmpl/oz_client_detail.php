<style>
.box-1 {
	position:relative;overflow:hidden;
	width:400px;height:200px;border:1px dashed #900;text-align:center;margin:5px;float:left;
}
.ajax_loader {background: url("./images/load.gif") no-repeat center center transparent;width:100%;height:100%;}
</style>

<div id="content">
	<div class="row" style="min-height:1rem"> </div>

	<div class="row" style="min-height:15rem" >
		<div class="col-3" style="font-size: 1.2rem;">
			<div>Клиенты:</div> 
		</div>

		<div class="col-8">
			<div class="table-row">
				<form action="./oz_editclient.php" method="post">
					<table class="table profile" >
						<tr class="profID">
							<td> ID:</td>
							<td><input class="form-control" name="cid" type="cid" value=":=row6=:" id="cid" readonly> </td>
						</tr>
						<tr class="profID">
							<td> Головная организация:</td><td><input class="form-control" name="head" type="head" value=":=row5=:" id="head" :=edit=:> </td>
						</tr>
						<tr class="profID">
							<td> Наименование:</td><td><input class="form-control" name="caption" type="caption" value=":=row0=:" id="caption" :=edit=:> </td>
						</tr>
						<tr class="profID">
							<td> БИН / ИИН:</td><td><input class="form-control" name="iin" type="iin" value=":=row1=:" id="iin" :=edit=:> </td>
						</tr>
						<tr class="profID">
							<td> Город:</td><td><input class="form-control" name="address" type="address" value=":=row2=:" id="address" :=edit=:> </td>
						</tr>
						<tr class="profID">
							<td> E-mail:</td><td><input class="form-control" name="email" type="email" value=":=row3=:" id="email" :=edit=:> </td>
						</tr>
						<tr class="profID">
							<td> Статус:</td><td><input class="form-control" name="status" type="status" value=":=row4=:" id="status" :=edit=:> </td>
						:=button=:
			
					</table>
				</form>
			</div>	
<script type="text/javascript">
 $('#edit').click(function(){
   $('#content').load('./oz_client_detail.php?cid=":=id=:"&edit=qq');
 });

  $('#supp').click(function(){
   $('#content').load('./oz_client_sup_list.php?inn=:=iin=:&city=:=city=:');
 });

  $('#back').click(function(){
   $('#content').load('./oz_client_detail.php?cid=":=id=:"&edit=back' );
 });
  $(window).on('load', function () {
    var $preloader = $('#p_prldr'),
        $svg_anm   = $preloader.find('.svg_anm');
    $svg_anm.fadeOut();
    $preloader.delay(500).fadeOut('slow');
})
 
</script>