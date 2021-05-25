<!DOCKTYPE html>

<html lang = "ru">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content = "ie=edge">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1.1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<title>AutoSell</title>
</head>
<body>
	<?php require "header.php"?>
	<div class="container mt-4">
		<h3>Вход</h3>
	  	<form action="/autosell/index.php" method="POST">
	  		<input type="text" name="login" placeholder="Введите логин" class="form-control"></input>
	  		<input type="password" name="password" placeholder="Введите пароль" class="form-control mt-2"></input>
	  		<button type="submit" name="send" class="btn btn-success mt-2">Войти</button>
	  	</form>
  	</div>
</body>
</html>