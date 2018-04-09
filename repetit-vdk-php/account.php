<?php if(isset($_COOKIE['login'])&&($_COOKIE['login']==md5('angelikacbk'))):?>
	
	<?php 
	$json = file_get_contents('config/data.json');
	$new_json = json_decode($json);
	
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Панель администратора</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/acc.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>


		<div class="" style="margin: 60px auto">
			<h1 style="text-align: center;">Редактирование контактов и добавление учебной литературы</h1>
			<div class="container">
				<h3>Добро пожаловать на сайт, <?=$new_json->firstname;?> </h3>
			</div>
			<div class="row" style="text-align: center;  width: 100%;">
				<div class="col-md"></div>
				<div class="col-md" >
					<form method="post" action="update.php">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Имя:</label>
							<input name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите Имя">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Фамилия:</label>
							<input name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите Фамилию">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Отчество:</label>
							<input name="nextname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите Отчество">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Телефон:</label>
							<input name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите телефон">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">E-mail:</label>
							<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите почту">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Whatsapp:</label>
							<input name="whatsapp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите whatsapp">
						</div>
						<input value="Сохранить" type="submit" class="btn btn-success" style="width: 40%; text-transform:uppercase;"><br><br>
					</form>
				</div>
				<div class="col-md">
					<form method="post" action="add-book.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Экзамен:</label>
							<select name="exam" class="form-control" id="exampleFormControlSelect1">
								<option selected>Выберите экзамен</option>
								<option value="ЕГЭ">ЕГЭ</option>
								<option value="ОГЭ">ОГЭ</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Название учебника:</label>
							<input name="book" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название учебника">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Автор:</label>
							<input name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите автора">
						</div>
						<div class="form-group">
							<div class="form-group">
								<label for="exampleFormControlFile1">Файл:</label>
								<div class="custom-file">
									<input name="userfile" type="file" class="custom-file-input" id="customFile" placeholder="Загрузить">
									<label class="custom-file-label" for="customFile">Выберите файл</label>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-success" style="width: 35%; text-transform:uppercase;">Добавить</button>
					</form>
				</div>
				<div class="col-md"></div>
			</div>
			
		</div>
		<div class="container">
			<h3>Редактирование текста на главной страницы</h3>
			<form action="text.php" method="post">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Заголовок:</label>
					<input name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название учебника">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Основной текст:</label>
					<textarea name="area" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 100%"></textarea>
				</div>
				<input class="btn btn-success" type="submit" name="submit" value="Сохранить" style="width: 15%; text-transform:uppercase;">
			</form><br><br>
		</div>
		<div class="container">
			<div class=" btn btn-success">
				<a style="  
				color: white;
				font-size: 20px;	
				font-family: helvetica;
				text-transform: uppercase;
				text-decoration: none;
				" href="logout">Выйти</a>
			</div>
		</div><br><br><br>


		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
</body>
</html>

<?php else:?>
	<a style="color: red; font-size: 25px; text-transform: uppercase; text-decoration: none;" href="login.php">Перейдите на страницу входа, чтобы авторизоваться.</a>


<?php endif;?>

