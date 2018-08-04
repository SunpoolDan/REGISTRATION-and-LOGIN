<?php session_start();
			require_once 'functions.php';
			createTable('profiles',
								  'user VARCHAR(16),
								   pass VARCHAR(255),
								   surname VARCHAR(255),
								   name VARCHAR(255),
								   email VARCHAR(255),
								   INDEX(user(6))');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Главная</title>
</head>
<body>	
	<?php
		if (!isset($_SESSION['user'])) {
			echo "<a href='/registration/registration.php'>Регистрация</a><br>
	          <a href='/login/login.php'>Войти на сайт</a><br>";
		}
		if (isset($_SESSION['user'])) {
			echo "<p>Спасибо что зашли на наш сайт</p>
            <img src='main.gif' alt='Основная картинка'><br>
            <a href='logout.php'>Выход</a>";
	  }
	?>
</body>
</html>