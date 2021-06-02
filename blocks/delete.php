<body class="text-center">
<form action="/autosell/index.php" method="POST" class="mt-5">

<div class="container mt-5">
	<h3 class="display-4 fw-normal mt-5 mb-5 text-center">Подтвердите удаление объявления</h3>
	<div class="row mb-3 text-center">
	      <div class="col-6 themed-grid-col">
	      	<button type="submit" name="delete" class="btn btn-success plusandminus hover mt-3" value = "<?php echo $_POST['del'] ?>">Удалить</button>
            </div>
         
	      <div class="col-6 themed-grid-col">
	      	<button type="submit" name="delete" class="btn btn-success plusandminus hover mt-3" value = "0">Отмена</button>
	      </div>
	</div>
</div>
</form>
</body>