<?php 
require_once '../functions.php';
$nickname=$password_1="";
if (isset($_POST['nickname'])) 
	$nickname = fixString($_POST['nickname']);
if (isset($_POST['password_1'])) 
	$password_1 = fixString($_POST['password_1']);

$fail = logValNickname($nickname);
$fail.= logValPassword($password_1);

if ($fail=="") {
	logInCheck($nickname, $password_1);
}else{
	echo $fail;
}
?>