<?php 


$data = $_POST;

$name = $data['name'];
$login = $data['login'];
$phone = $data['phone'];
$email = $data['email'];
$text = $data['text'];

$name = htmlspecialchars($name);
$login = htmlspecialchars($data['login']);
$phone = htmlspecialchars($data['phone']);
$email = htmlspecialchars($data['email']);
$text = htmlspecialchars($data['text']);

$name = urldecode($name);
$login = urldecode($login);
$phone = urldecode($phone);
$email = urldecode($email);
$text = urldecode($text);

$to = 'den030397@yandex.ru';
$subject = 'Запись с сайта REPETIT-VDK';
$message = $text."\n".$email."\n".$login."\n".$name."\n".$phone;
// $headers = 'From: '.$email."\r\n".
// 		'Skype login: '.$login."\r\n".
// 		'Name: '.$name."\r\n".
// 		'Phone: '.$phone."\r\n".
	$headers = 'X-Mailer: PHP/' . phpversion()."\r\n";


if (mail($to, $subject, $message, $headers))
 { 
    echo "сообщение успешно отправлено"; 
} else { 
    echo "при отправке сообщения возникли ошибки"; 
}

 ?>


