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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<title>AutoSell</title>
</head>
<body>
	<?php include "blocks/header.php"?>
  	
  	<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
  		<h3 class="display-4 fw-normal mb-5">Поиск объявлений</h3>
  		<div class="d-flex flex-wrap">
	  		<?php
	  		for($i = 1; $i < 7; $i++):
			?>
		  		<div class="card mb-4 rounded-3 shadow-sm">
		          <div class="card-header py-3">
		            <h4 class="my-0 fw-normal">Free</h4>
		          </div>
		          <div class="card-body">
		          	
		          	<button type = "button<?php echo $i ?>" class = "btn btn-outline-primary1">
		          		<img src="img/logo/<?php echo $i ?>.png"> 
		          	</button>

		          </div>
		        </div>
	        <?php endfor; ?>
    	</div>
  	</div>
  	<?php
  	//$log = $_POST['login'];
  	echo $user->getnum();

  	?>
</body>
</html>