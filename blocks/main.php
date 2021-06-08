<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
  		<h3 class="display-4 fw-normal mb-5">Поиск объявлений</h3>
  		<div class="d-flex flex-wrap">
	  		<?php
	  		global $mysqli;
	  		$result = $mysqli->query('SELECT COUNT(*) FROM Brand ');
	  		$row1 = mysqli_fetch_row($result);
	  		for($i = 1; $i <= $row1[0]; $i++):
			?>
		  		<div class="card mb-4 rounded-3 shadow-sm">
		        	<div class="card-header py-3">	
			          	<?php 
			          	$result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $i . '\'');
			          	$row = mysqli_fetch_row($result); 
			          	?>
			            <h4 class="my-0 fw-normal"><?php echo $row[0] ?></h4>
		          	</div>
		          	<div class="card-body">
						<a class = "btn btn-outline-primary1" href = ?<?php echo $row[0] ?>>
			          		<img src="img/logo/<?php echo $i ?>.png"> 
			          	</a>
		         	</div>
		        </div>
	        <?php endfor; ?>
    	</div>
  	</div>