<?php 



Add_Book();

function Add_Book() {
	$file = file_get_contents('config/exam.json');
	$list1 = json_decode($file, TRUE);
	unset($file);
	$list1[] = array('exam'=>$_POST['exam'],'book'=>$_POST['book'],'author'=>$_POST['author'],'file_name'=>upload());
	$send_json = json_encode($list1,true);
	file_put_contents('config/exam.json',$send_json);
	// header("Location: /account.php");
}

function upload()
{
	// Каталог, в который мы будем принимать файл:
	$uploaddir = 'files/';
	$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
	if (copy($_FILES['userfile']['tmp_name'], $uploadfile))
	{
		echo "<h3>Файл успешно загружен на сервер</h3>";
	}
	else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

// Выводим информацию о загруженном файле:
	echo "<h3>Информация о загруженном на сервер файле: </h3>";
	echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['userfile']['name']."</b></p>";
	echo "<p><b>Mime-тип загруженного файла: ".$_FILES['userfile']['type']."</b></p>";
	echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['userfile']['size']."</b></p>";
	echo "<p><b>Временное имя файла: ".$_FILES['userfile']['tmp_name']."</b></p>";
	return $uploadfile;
} 

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container" style="margin-top: 5%">
	<a class="btn btn-danger" href="account.php">Назад в панель администратора.</a>
</div>
