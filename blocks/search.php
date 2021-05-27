<script type="text/javascript" language="javascript" src="js/search.js"></script>
<body>

	<form action="/autosell/index.php" method="POST" class="css-vhov95">
	<div class="row">
		<div class="col-sm-6">
			<div class="row ml-5">
				<div class="col-sm-6">

				<?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Brand');

					$row = mysqli_fetch_row($result);
    		  	?>
					<label class="form-label">Бренд</label>
					<select  class="form-select1" name="Brand" onchange="if (this.value) window.location.href = this.value">
						
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option name="<?php echo $row[0] ?>" <?php if(isset($_GET[$row1[0]])) { echo "selected"; $b = $i; }?> value="http://localhost/autosell/?<?php echo $row1[0] ?>"><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>
	    		</div>
	    		<div class="col-sm-6">
				<?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Model WHERE BNUM = \'' . $b . '\'');
					$row = mysqli_fetch_row($result);
					$result = $mysqli->query('SELECT MNUM FROM Model WHERE BNUM = \'' . $b . '\'');
					$beg = mysqli_fetch_row($result);
    		  	?>
					<label class="form-label">Модель</label>
					<select  class="form-select1" name="Model" >
						<option name="Any">Любая</option>
		              	<?php
		              	for($i = $beg[0]; $i < $row[0] + $beg[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT MNAME FROM Model WHERE MNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option name="<?php echo $row1[0] ?>"><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>
	    		</div>

				<div class="col-sm-6">
	    			<label class="form-label">Цена от</label>
	    			<input type="number" min="0" class="form-control" name="pricelow" step="1">
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Цена до</label>
	    			<input type="number" min="0" class="form-control" name="pricehigh" step="1">
	    		</div>

	    		<div class="col-sm-6">
	    			<label class="form-label">Год от</label>
	    			<input  type="number" class="form-control" name="yearlow" min="1940" max="2021" step="1">
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Год до</label>
	    			<input type="number" class="form-control" name="yearhigh" min="1940" max="2021" step="1">
	    		</div>

	    		<div class="col-sm-6">
	    			<label class="form-label">Пробег от</label>
	    			<input type="number" class="form-control" name="mileagelow" min="0" max="1000000" step="1">
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Пробег до</label>
	    			<input type="number" class="form-control" name="mileagehigh" min="0" max="1000000" step="1">
	    		</div>
	    	</div>	
	    </div>

	    <div class="col-sm-6">
			<div class="row ml-5">	
				<div class="col-sm-6">
	    			<label class="form-label">Объем от </label>
	    			<input type="number" class="form-control" name="enginevallow" min="0.7" max="6.0" step="0.1">
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Объем до </label>
	    			<input type="text" class="form-control" name="enginevalhigh" min="0.7" max="6.0" step="0.1">
	    		</div>

	    		<div class="col-sm-6">
	    			<label class="form-label">Мощность от </label>
	    			<input type="number" class="form-control" name="powerlow" min="1" max="10000" step="1">
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Мощность до </label>
	    			<input type="number" class="form-control" name="powerhigh" min="1" max="10000" step="1">
	    		</div>

				<div class="col-sm-6">
	              <?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Transmission');

					$row = mysqli_fetch_row($result);
    		  	  ?>
					<label class="form-label">Трансмиссия</label>
					<select  class="form-select1" name="Transmission">
						<option name="Any">Любая</option>
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT TNAME FROM Transmission WHERE TNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option  name="<?php echo $row1[0] ?>" <?php if(isset($_GET[$row1[0]])) { echo "selected"; $b = $i; }?> ><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>
	    		</div>


	    		<div class="col-sm-6">
	              <?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Engine1');

					$row = mysqli_fetch_row($result);
    		  	  ?>
					<label class="form-label">Топливо</label>
					<select  class="form-select1" name="Engine">
						<option name="Any">Любое</option>
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT ENAME FROM Engine1 WHERE ENUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option  name="<?php echo $row1[0] ?>" <?php if(isset($_GET[$row1[0]])) { echo "selected"; $b = $i; }?> ><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>

	    		</div>

				<div class="col-sm-6">
	              <?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Wheel');

					$row = mysqli_fetch_row($result);
    		  	  ?>
					<label class="form-label">Руль</label>
					<select  class="form-select1" name="Wheel">
						<option name="Any">Любой</option>
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT WNAME FROM Wheel WHERE WNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option  name="<?php echo $row1[0] ?>" <?php if(isset($_GET[$row1[0]])) { echo "selected"; $b = $i; }?> ><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>
	    		</div>
	    		<div class="col-sm-6 ">
	    				<button type="submit" name="send" class="btn btn-success search hover">Поиск</button>
	    		</div>
	    	</div>	
	    </div>
	</div>
   	</form>
</body>