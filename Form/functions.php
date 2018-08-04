<?php 
/*******************************************НАСТРОЙКА БД********************************************/
$db = array('host'     => 'localhost',
            'user'     => 'root',
            'password' => '',
            'name'     => 'logreg');

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);

if (mysqli_connect_error())die(mysqli_connect_error());

function createTable($name , $query){
	global $link;
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
}

function queryMysql($query){
	global $link;
	$result = mysqli_query($link, $query);
	if(!$result) die(mysqli_connect_error());
	return $result;
}

function fixString($var){
	global $link;
	$var = strip_tags($var);
	$var = stripslashes($var);
	$var = htmlentities($var);
	return mysqli_real_escape_string($link, $var);
}

function logValNickname($string){
	if ($string=="") {
		return "Введите логин";
	}else if(preg_match("/[\W]/", $string)){
		return "В логине используются неприемлимые символы";
	}
	return"";
}

function logValPassword($string){
	if ($string=="") {
		return "Введите пароль";
	}else if(preg_match("/[\W]/", $string)){
		return "В пароле используются неприемлимые символы";
	}
	return"";
}

function logInCheck($nick, $pass){
	$result = queryMysql("SELECT * FROM profiles WHERE user='$nick'");
	if (mysqli_num_rows($result)) {
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$pass_check = $row['pass'];
		if (password_verify("$pass", "$pass_check")){
			$_SESSION['user'] = $nick;
			$_SESSION['pass'] = $pass;
			echo "Добро пожаловать!<br> <a href='../'>Вернуться на главную</a><br>";

		}else{
			echo "Введен неверный пароль";
		}	
	}else{
		echo "Введен неверный логин";
	}
}

function valForename($string){
	if ($string=="") {
		return "Введите имя";
	}else{
		return "";
	}
} 

function valSurname($string){
	if ($string=="") {
		return "Введите фамилию";
	}else{
		return "";
	}
}

function valNickname($string){
	if ($string=="") {
	 return "Введите никнейм";
	}else if(strlen($string)<5){
		return "Никнейм долже быть длиннее 5 символов";
	}else if(preg_match("/[\W]/", $string)){
		return "В никнейме используются недопустимые символы";
	}
	return "";
}

function valPassword($string_1,$string_2){
 if ($string_1=="") {
   return "Введите пароль";
 }else if(strlen($string_1)<6){
 	 return "Пароль должен быть длиннее 6 символов";
 }else if(preg_match("/[\W]/", $string_1)){
 	 return "В пароле используются недопустимые символы";
 }else if($string_1!=$string_2){
 	 return "Пароли не совпадают";
 }
 return "";
}

function valEmail ($string){
	if ($string == "") {
		return "введите Email!";
	}else{
		return "";
	}
}

function regCheck($forename,$surname,$user,$pass,$email){
	$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
		if (mysqli_num_rows($result)) {
			echo "Такой Никнейм уже существует<br>";
		}else{
			$pass = password_hash("$pass", PASSWORD_DEFAULT);
			queryMysql("INSERT INTO profiles VALUES('$user','$pass','$surname','$forename','$email')");
			echo "Добро пожаловать!<br> <a href='../login/login.php'>А теперь войдите на сайт</a><br>";
    }
}    

function destroySession(){
	$_SESSION=array();
	if (session_id() != "" || isset($_COOCIE[session_name()])) {
		setcookie(session_name(), '', time()-2592000,'/');
	}
	session_destroy();
}
?>