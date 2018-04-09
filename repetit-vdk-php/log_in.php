<?php 


$data = $_POST;
$errors = array();

$real_login = 'angelikacbk';
$real_password = 'aaaaaaaaaa';

if ($data['login']!='') {
	if ($data['password']!='') {
		if ($data['login']==$real_login) {
			if ($data['password']==$real_password) {
				setcookie("login",md5($data['login']),time()+3600);
				header("Location: /account"); 
			} else {
				$errors[] = 'Неправильный пароль';
			}
		} else {
			$errors[] = 'Неправильный логин';
		}
	} else {
		$errors[] = 'Введите пароль';
	}
} else {
	$errors[] = 'Введите логин';
}

if ( !empty($errors))//Ошибок нет и мы продолжаем
    {
        echo '<div style="color: red">'.array_shift($errors).'</div>';
    }