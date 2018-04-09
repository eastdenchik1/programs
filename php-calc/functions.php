<?php 


$data = $_POST;
$error = array();



function isBinary($aNumb){
	$len = strlen($aNumb);
	for ($i=0; $i < $len ; $i++) { 
		$theChar = $aNumb[$i];
		if ($theChar < "0" || $theChar > "1") {
			return false;
		} 
	}
	return true;
}

function isDec($aString)
{
	$len = strlen($aString);
	for ($i = 0; $i < $len; $i++) {
		$theChar = $aString[$i];
		if ($theChar < '0' || $theChar > '9') {
			return false;
		}
	}
	return true;
}


function isDigit($aString)
{
	$len = strlen($aString);
	for ($i = 0; $i < $len; $i++) {
		$theChar = $aString[$i];
		if ($theChar < '0' || $theChar > '9') {
			return false;
		}
	}
	return true;
}

$firstnum = $data['firstnum'];
$secondnum = $data['secondnum'];

if ($data['clean']) {
	$answer = "";
	$error[] = "";
	header("Location: /");
}

if ($data['evaluation2']) {
	if ($data['numb']!="") {
		switch ($data['operation2']) {
		case '2>10':
		if (isBinary($data['numb'])) {
			$answer = bindec($data['numb']);
		} else {
			$error[] = "Введите двоичное число";
		}
		break;		
		case '10>2':
		if (isDec($data['numb'])) {
			$answer = decbin($data['numb']);
		} else {
			$error[] = "Введите десятичное число";
		}
		break;	
		case '8>2':
		$answer = octdec($data['numb']);
		$answer = decbin($answer);
		break;	
		case '2>8':
		$answer = bindec($data['numb']);
		$answer = decoct($answer);
		break;	
		case '16>2':
		$answer = hexdec($data['numb']);
		$answer = decbin($answer);
		break;	
		case '2>16':
		$answer = bindec($data['numb']);
		$answer = dechex($answer);
		break;	
	}
	} else {
		$error[] = "Упс... Введите число.";
	}
	
}

if ($data['evaluation']) {
	if (($firstnum == '')&&($secondnum == '')) {
		$error[] = 'Упс... Введите числа';
	} else {
		if (isDigit($firstnum)) { 
			if (isDigit($secondnum)) {
				switch ($data['operation']) {
					case '^':
					$answer = pow($firstnum,$secondnum);
					break;
					case '+':
					$answer = $firstnum + $secondnum;
			// var_dump($answer);
					break;
					case '!':
					$f = 1;
					$i = 1;
					while ($i <= $firstnum) {
						$f = $f*$i;
						$i = $i+1;
					}
					$answer = $f;
					break;
					case '-':
					$answer = $firstnum - $secondnum;
			// var_dump($answer);
					break;
					case '*':
					$answer = $firstnum * $secondnum;
			// var_dump($answer);
					break;
					case '/':
					if ($secondnum == 0) {
						$error[] = "Упс... Ошибочка! На ноль делить нельзя!";
					} else {
						$answer = $firstnum / $secondnum;
					}
			// var_dump($answer);
					break;
					default:
					$error[] = "Упс... Выберите операцию.";
					break;
				}
			} else {
				$error[] = "Упс... Нужно ввести число, а не буквенный символ";
			}
		} else {
			$error[] = "Упс... Нужно ввести число, а не буквенный символ";
		}
	}
}



$options = [
    'cost' => 11,
];

if ($_POST['md5']) {
	$result = md5($_POST['1st']);
} elseif ($_POST['bcrypt']) {
	$result = password_hash($_POST['1st'], PASSWORD_BCRYPT, $options);
}

if ($_POST['clear']) {
	$result = "";
	header("Location: /");
}



if (($data['randomize'])){
	if ($data['randnum']!="") {
		$rand_res = random_int(1, $data['randnum']);
	} else {
		$error[] = "Упс... Введите число.";
	}
}


?>