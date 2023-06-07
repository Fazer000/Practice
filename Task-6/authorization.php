<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вход в ваш Список задач</title>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	
	<div class="container_auth">
		<p class="container_title">АВТОРИЗАЦИЯ</p>
		<form action="controllers/auth.php" method="POST" class="auth_form">
			<div class="form_item">
				<p class="form_text">Почта</p>
				<input type="text" name="email" placeholder="Ваш адрес электронной почты">
			</div>
			<div class="form_item">
				<p class="form_text">Пароль</p>
				<input type="password" name="password" placeholder="Ваш пароль" >
			</div>
			<div class="form_item">
				<input type="submit" name="auth_sub" class="auth_sub" value="Войти">
			</div>
		</form>

		<?php
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>
	</div>

</body>
</html>