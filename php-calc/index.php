<?php 

include 'functions.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Калькулятор на php</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="text-transform: uppercase; font-weight: bold; background: #efefef" >


	<div class="container">
		<div class="row">
			<div class="col-md col-sm-11"><br><br><br>
				<form action="index.php" method="post">
					<label for="">Обычный калькулятор: </label><br>
					<div class="form-group">
						<label for="">Введите 1 число (a): </label>
						<input class="form-control" name="firstnum" type="text">
					</div>
					<div class="form-group">
						<label for="">Введите 2 число (b): </label>
						<input class="form-control" name="secondnum" type="text">
					</div>
					<label for="">Выберите действие</label><br>
					<div class="form-group">
						<select name="operation" class="form-control" id="exampleFormControlSelect1">
							<option value="+">+</option>
							<option value="-">-</option>
							<option value="*">*</option>
							<option value="/">/</option>
							<option value="^">a^b</option>
							<option value="!">a!</option>
						</select>
					</div>
					<br>
					<input style="width: 100%" class="btn btn-primary btn-lg" type="submit" name="evaluation" value="Решение"><br><br>
					<input style="width: 100%" class="btn btn-primary btn-lg" type="submit" name="clean" value="Очистить"><br>
				</form><br><br>
				<form action="index.php" method="post">
					<label for="">Рандомайзер: </label><br>
					<div class="form-group">
						<label for="">Введите число: </label>
						<input class="form-control is-valid" name="randnum" type="text">
					</div>
					<input type="submit" name="randomize" style="width: 100%" class="btn btn-success btn-lg" value="RANDOM"><br><br>
				</form>
			</div>
			<div class="col-md col-sm-11"><br><br><br>
				<form action="index.php" method="post">
					<label for="">Информатика (Системы счисления): </label><br>
					<div class="form-group">
						<label for="">Введите число: </label>
						<input class="form-control" name="numb" type="text">
					</div>
					<div class="form-group">
						<select name="operation2" class="form-control" id="exampleFormControlSelect1">
							<option disabled value="Выберите операцию">Выберите операцию</option>
							<option value="10>2">Десятичное в двоичное</option>
							<option value="2>10">Двоичное в десятичное</option>
							<option value="8>2">Восмеричное в двоичное</option>
							<option value="2>8">Двоичное в восмеричное</option>
							<option value="16>2">Шестнадцатиричное в двоичное</option>
							<option value="2>16">Двоичное в Шестнадцатиричное</option>
						</select>
					</div><br>
					<input style="width: 100%" class="btn btn-primary btn-lg" type="submit" name="evaluation2" value="Перевод"><br>
				</form><br><br>
				<form action="index.php" method="post">
					<label for="">Шифрование паролей: </label><br>
					<div class="form-group">
						<label for="">Введите пароль для шифрования: </label>
						<input class="form-control is-valid" name="1st" type="text">
					</div>
					<input type="submit" name="md5" style="width: 100%" class="btn btn-success btn-lg" value="MD5"><br><br>
					<input type="submit" name="bcrypt" style="width: 100%" class="btn btn-warning btn-lg" value="Алгоритм CRYPT_BLOWFISH"><br><br>
					<input type="submit" name="clear" style="width: 100%" class="btn btn-danger btn-lg" value="CLEAR"><br><br>
				</form>
			</div>
			<div class="col-md col-sm-11"><br><br><br>
				<div class="alert alert-danger" role="alert">
					<?php 
				if ( !empty($error))//Ошибок нет и мы продолжаем
				{
					echo '<div style="color: red">'.array_shift($error).'</div>';
				}
				?>
			</div>
			<label for="" class="col-form-label"><strong>Ответ:</strong>  </label><br>
			<div class="alert alert-primary" role="alert">
				<?php

				if ($data['evaluation']) {
					if ($answer == '0'){
						echo $firstnum." ".$data['operation']." ".$secondnum." = ".$answer;
					} 
					elseif ($answer == "") {
						echo "";
					} else {
						echo $firstnum." ".$data['operation']." ".$secondnum." = ".$answer;
					}
				} elseif ($data['evaluation2']) {
					echo $data['numb']." : (".$data['operation2'].") = ".$answer;
				}

				?>
			</div>
			<div>
				<label for="">Зашиврованный пароль: </label><br>
				<div class="alert alert-success" role="alert">
					<?php
					if ($data['md5']) {
						echo $result;
					} elseif ($data['bcrypt']) {
						echo $result;
					} else {
						echo "";
					}?>
				</div>
			</div>
			<div>
				<label for="">Сгенерированное число: </label><br>
				<div class="alert alert-success" role="alert">
					<?php
					echo $rand_res;
					?>
				</div>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>