<?php include('./header.php'); ?>
<div id="content" >
 <div class="row" style="min-height:1rem"></div> 
 <div class="row" style="min-height:15rem" >
  <div class="col-3" style="font-size: 1.2rem;">
    <div>Регистрация пользователя:</div></div>

		<div class="col-8 form-group">
		<form method="post" action="./adduser.php">
		ФИО: <input id="FIO" class="form-control" type="text" name="FIO" /><br />	
		Логин: <input id="login" class="form-control" type="text" name="login" /><br />
		Пароль: <input id="password" class="form-control" type="password" name="password" /><br />
		Подтверждение: <input id="re_pass" class="form-control" type="password" name="password2" /><br />

		<button class="btn btn-dark" type="submit" name="do_signup">Зарегистрировать </button>
		</form>
		</div>
 </div>
</div>

