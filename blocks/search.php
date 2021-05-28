<script type="text/javascript" language="javascript" src="js/search.js"></script>
<body>

	<form action="/autosell/index.php" method="GET" class="css-vhov95">
	<div class ="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="row ">
				<div class="col-sm-6">

				<?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Brand');

					$row = mysqli_fetch_row($result);
    		  	?>
					<label class="form-label">Бренд</label>
					<select  class="form-select1" name="Brand" onchange="if (this.value) window.location.href = 'http://localhost/autosell/?'+this.value">
						
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option name="<?php echo $row[0] ?>"
		                	<?php if(isset($_GET['Brand']) and $_GET['Brand'] == $row1[0]) { echo "selected"; $b = $i; }?> 
		                	<?php if(isset($_GET[$row1[0]])) { echo "selected"; $b = $i; }?> value="<?php echo $row1[0] ?>"><?php echo $row1[0] ?></option>
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
						<option value="Any">Любая</option>
		              	<?php
		              	for($i = $beg[0]; $i < $row[0] + $beg[0]; $i++):
		              		
			              	$result = $mysqli->query('SELECT MNAME FROM Model WHERE MNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option <?php if(isset($_GET['Model']) and $_GET['Model'] == $i) { echo "selected";}?>
	                		value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>
	    		</div>

				<div class="col-sm-6">
	    			<label class="form-label">Цена от</label>
	    			<input required="" onfocus="this.select();" type="number" min="0" class="form-control" name="pricelow" step="1" 
	    				<?php if(isset($_GET['pricelow'])) { echo "value ="; echo $_GET['pricelow'];} 
	    					else {echo "value = 0";}
	    				?> >
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Цена до</label>
	    			<input required="" onfocus="this.select();" type="number" min="0" class="form-control" name="pricehigh" step="1"
	    			<?php if(isset($_GET['pricehigh'])) { echo "value ="; echo $_GET['pricehigh'];}
	    				else {echo "value = 3000000";}
	    			?>>
	    		</div>

	    		<div class="col-sm-6">
	    			<label class="form-label">Год от</label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="yearlow" min="1940" max="2021" step="1"
	    			<?php if(isset($_GET['yearlow'])) { echo "value ="; echo $_GET['yearlow'];}
	    				else {echo "value = 1940";}
	    			?>>
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Год до</label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="yearhigh" min="1940" max="2021" step="1"
	    			<?php if(isset($_GET['yearhigh'])) { echo "value ="; echo $_GET['yearhigh'];}
	    				else {echo "value = 2021";}
	    			?>>
	    		</div>

	    		<div class="col-sm-6">
	    			<label class="form-label">Пробег от</label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="mileagelow" min="0" max="1000000" step="1"
	    			<?php if(isset($_GET['mileagelow'])) { echo "value ="; echo $_GET['mileagelow'];}
	    				else {echo "value = 0";}
	    			?>>
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Пробег до</label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="mileagehigh" min="0" max="1000000" step="1"
	    			<?php if(isset($_GET['mileagehigh'])) { echo "value ="; echo $_GET['mileagehigh'];}
	    				else {echo "value = 1000000";}
	    			?>>
	    		</div>
	    	</div>	
	    </div>

	    <div class="col-sm-6">
			<div class="row ">	
				<div class="col-sm-6">
	    			<label class="form-label">Объем от </label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="enginevallow" min="0.7" max="6.0" step="0.1"
	    			<?php if(isset($_GET['enginevallow'])) { echo "value ="; echo $_GET['enginevallow'];}
	    				else {echo "value = 0.7";}
	    			?>>
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Объем до </label>
	    			<input required="" onfocus="this.select();" type="text" class="form-control" name="enginevalhigh" min="0.7" max="6.0" step="0.1"
	    			<?php if(isset($_GET['enginevalhigh'])) { echo "value ="; echo $_GET['enginevalhigh'];}
	    				else {echo "value = 6.0";}
	    			?>>
	    		</div>

	    		<div class="col-sm-6">
	    			<label class="form-label">Мощность от </label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="powerlow" min="1" max="1000" step="1"
	    			<?php if(isset($_GET['powerlow'])) { echo "value ="; echo $_GET['powerlow'];}
	    				else {echo "value = 1";}
	    			?>>
	    		</div>
	    		<div class="col-sm-6">
	    			<label class="form-label">Мощность до </label>
	    			<input required="" onfocus="this.select();" type="number" class="form-control" name="powerhigh" min="1" max="1000" step="1"
	    			<?php if(isset($_GET['powerhigh'])) { echo "value ="; echo $_GET['powerhigh'];}
	    				else {echo "value = 1000";}
	    			?>>
	    		</div>

				<div class="col-sm-6">
	              <?php 
					global $mysqli;
					$result = $mysqli->query('SELECT COUNT(*) FROM Transmission');

					$row = mysqli_fetch_row($result);
    		  	  ?>
					<label class="form-label">Трансмиссия</label>
					<select  class="form-select1" name="Transmission">
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT TNAME FROM Transmission WHERE TNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option  <?php if(isset($_GET['Transmission']) and $_GET['Transmission'] == $i) { echo "selected";}?>
		                		value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
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
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT ENAME FROM Engine1 WHERE ENUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option  <?php if(isset($_GET['Engine']) and $_GET['Engine'] == $i) { echo "selected";}?>
		                		value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
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
		              	<?php
		              	for($i = 1; $i <= $row[0]; $i++):
		              	
			              	$result = $mysqli->query('SELECT WNAME FROM Wheel WHERE WNUM = \'' . $i . '\'');	
			              	$row1 = mysqli_fetch_row($result);
		              	?>
		                	<option  <?php if(isset($_GET['Wheel']) and $_GET['Wheel'] == $i) { echo "selected";}?>
		                		value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
		                <?php endfor; ?>
	              	</select>
	    		</div>
	    		<div class="col-sm-6 ">
	    				<button type="submit" name="send1" class="btn btn-success search hover" value = "1">Поиск</button>
	    		</div>
	    	</div>	
	    </div>
	</div>
</div>
   	</form>
</body>