<?php 
require_once '../functions.php';
$forename=$surname=$nickname=$password_1=$password_2=$email="";
if (isset($_POST['forename'])) 
	$forename = fixString($_POST['forename']);
if (isset($_POST['surname'])) 
	$surname = fixString($_POST['surname']);
if (isset($_POST['nickname'])) 
	$nickname = fixString($_POST['nickname']); 
if (isset($_POST['password_1'])) 
	$password_1 = fixString($_POST['password_1']);
if (isset($_POST['password_2'])) 
	$password_2 = fixString($_POST['password_2']);
if (isset($_POST['email'])) 
	$email = fixString($_POST['email']);

$fail = valForename($forename);
$fail.= valSurname($surname);
$fail.= valNickname($nickname);
$fail.= valPassword($password_1,$password_2);
$fail.= valEmail($email);

if ($fail=="") {
  regCheck($forename,$surname,$nickname,$password_1,$email);
}else{
	echo $fail;
}


?>
