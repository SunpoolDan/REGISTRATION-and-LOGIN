<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
</head>
<body>
	<form action="registration.php" method="post">
		<p>
			<?php 
		      if (isset($_POST['ok'])){
		      	require_once "check.php";
		      }
		    ?>
		</p>
		 <label for="forename">Имя:</label>
		<input type="text" name="forename" value="<?php echo $_POST['forename']; ?>"><br>
		 <label for="surname">Фамилия:</label>
		<input type="text" name="surname" value="<?php echo $_POST['surname']; ?>"><br>
		 <label for="nickname">Никнейм:</label>
		<input type="text" name="nickname" value="<?php echo $_POST['nickname']; ?>"><br>
		 <label for="password_1">Пароль:</label>
		<input type="password" name="password_1" value="<?php echo $_POST['password_1']; ?>"><br>
		 <label for="password_2">Повторите пароль:</label>
		<input type="password" name="password_2" value="<?php echo $_POST['password_2']; ?>"><br>
		 <label for="email">Email:</label>
		<input type="email" name="email" value="<?php echo $_POST['email'];?>"><br>
		<input type="submit"  name="ok" value="Зарегистрировать">
	</form>
	</body>
</html>