<?php 

class Personal_Data {
	public $firstname;
	public $lastname;
	public $nextname;
	public $phone;
	public $email;
	public $whatsapp;
	public $ID = 0;

	function Personal_Data() {
		$this->firstname = $_POST['firstname'];
		$this->lastname = $_POST['lastname'];
		$this->nextname = $_POST['nextname'];
		$this->phone = $_POST['phone'];
		$this->email = $_POST['email'];
		$this->whatsapp = $_POST['whatsapp'];
		$this->ID += 1;
	}
}

$Item = new Personal_Data();
// echo "<br/>".$Item->ID;
// echo "<br/>".$Item->firstname;
// echo "<br/>".$Item->lastname;
// echo "<br/>".$Item->nextname;
// echo "<br/>".$Item->phone;
// echo "<br/>".$Item->email;
// echo "<br/>".$Item->whatsapp;

$send_json = json_encode($Item);
file_put_contents('config/data.json',$send_json);

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container" style="margin-top: 5%">
	<a class="btn btn-danger" href="account.php">Назад в панель администратора.</a>
</div>
