<?php include('./header.php'); $id=$_GET['id'];?>
<div id="cntnt">
	<div class="row" style="min-height:1rem"> </div>
	<div class="row" style="min-height:15rem" >
		<div class="col-3" style="font-size: 1.2rem;">
			<div>Получатели:</div> 
		</div>

		<div class="col-8">
			<div class="table-row">

				<?php $clients=R::getall('SELECT name,id FROM OZ_CLIENTS where p_id='.$id);?>
 				<table class="table profile" >

				<?php foreach ($clients AS $row) {
				echo '<tr><td class="profID"><a href =./oz_client_detail.php?cid='.$row['id'].'>'.$row['name'].'</a></td></tr>';
}?>
				</table>
			</div>	
		</div>
	</div>
</div>
<div class="row" style="min-height:1rem"> </div>  
<div class="row" style="min-height:1rem">
<div class="col-3"> </div>
	<div class="col-8">
		<a href='./oz_clients.php'><button class="btn btn-dark" ><<Назад</button></a>
<?php echo'<a href="./add_oz_client_detail.php?cid='.$id.'&edit=qq ">'; ?>

	 	<button class="btn btn-dark" data-toggle="" data-target="" type="submit">Добавить</button> </a>
	</div>

</form>	
 </div>

			