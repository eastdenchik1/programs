<?php 

// echo $_POST['title']." \n".$_POST['area'];


class Main_Page {
	public $title;
	public $area;

	function Main_Page() {
		$this->title = $_POST['title'];
		$this->area = $_POST['area'];
	}
}

$Item = new Main_Page();

$send_json = json_encode($Item);
file_put_contents('config/reg.json',$send_json);

// var_dump($send_json);

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container" style="margin-top: 5%">
	<a class="btn btn-danger" href="account.php">Назад в панель администратора.</a>
</div>
