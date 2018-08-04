<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="login.php" method="post">
		<p><?php if (isset($_POST['ok'])) {
			require_once"check.php";
		} ?></p>
		<label for="nickname">Никнейм:</label>
		<input type="text" name="nickname" value="<?php echo $_POST['nickname']; ?>"><br>
		<label for="password_1">Пароль:</label>
		<input type="password" name="password_1" value="<?php echo $_POST['password_1']; ?>"><br>
		<input type="submit"  name="ok" value="Войти">
	</form>
</body>
</html>