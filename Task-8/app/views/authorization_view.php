<div class="container_auth">
	<p class="container_title">АВТОРИЗАЦИЯ</p>
	<form action="/authorization" method="POST" class="auth_form">
		<div class="form_item">
			<p class="form_text">Почта</p>
			<input type="text" name="email" placeholder="email@mail.ru">
		</div>
		<div class="form_item">
			<p class="form_text">Пароль</p>
			<input type="password" name="password">
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