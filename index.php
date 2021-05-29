<!DOCKTYPE html>
<?php
	include 'connects/database.php';
	include 'connects/auth.php';
?>
<html lang = "ru">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content = "ie=edge">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1.1">
	<link rel="stylesheet" type="text/css" href="css/style1.css?v=1.1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	
	<title>AutoSell</title>
</head>
<body>
	<?php include "blocks/header.php"?>
  	<?php

	if(isset($_GET['Toyota']) or isset($_GET['Nissan']) or isset($_GET['Mercedes-Benz']) or isset($_GET['Honda']) or isset($_GET['BMW']) or isset($_GET['Hyundai']) or isset($_GET['send1']))
	{
		include 'blocks/search.php';
		if(isset($_GET['send1']))
		{
			include 'blocks/ads.php';
		}
	}
	else 
	{
		if (isset($_GET['Ad']))
		{
			include 'blocks/singlead.php';
		}
		else
		{
			if (isset($_GET['Newad']))
			{
				include 'blocks/newad.php';
			}
			else
			{
				include "blocks/main.php";
			}
		}
		
	}
    

    ?>

  	
  	
</body>
</html>