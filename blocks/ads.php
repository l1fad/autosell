<body>
	<form action="/autosell/index.php" method="GET" >
	
		<div class="container">
		<?php 
		global $mysqli;
		$result = $mysqli->query('SELECT COUNT(*) FROM Ad');

		$row = mysqli_fetch_row($result);

		for($i = 1; $i <= $row[0]; $i++):
  		?>
			<a class = "btn1 btn-outline-primary2 mb-2 mr-5">
				<div class="row">
					<div class="col-sm-3 ">
						<img src = img/example.jpg width="240" height="180"> </img>
					</div>

					
					<div class="col-sm-6">
						<?php
						$result = $mysqli->query('SELECT MNUM, ADYEAR, EVAL, ADPOWER, ENUM, TNUM, DNUM, WNUM, MILVAL, ADPRICE FROM Ad WHERE ADNUM = \'' . $i . '\'');

						$row1 = mysqli_fetch_row($result);
						
						$result = $mysqli->query('SELECT MNAME, BNUM FROM Model WHERE MNUM = \'' . $row1[0] . '\'');

						$row2 = mysqli_fetch_row($result);

						$result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $row2[1] . '\'');
						$row3 = mysqli_fetch_row($result);


						?>
						
						<div class="row ml-5 ">
							<label class="form-label "><?php echo $row3[0] ?> <?php echo $row2[0] ?>, <?php echo $row1[1] ?>г. </label>
		    				<label ><?php echo $row1[2] ?>л(<?php echo $row1[3] ?> л.с.), </label>
		    				<?php
		    				$result = $mysqli->query('SELECT ENAME FROM Engine1 WHERE ENUM = \'' . $row1[4] . '\'');
		    				$row2 = mysqli_fetch_row($result);
		    				?>
		    				<label class="form-label"><?php echo $row2[0] ?>, </label>

		    				<?php
		    				$result = $mysqli->query('SELECT TNAME FROM Transmission WHERE TNUM = \'' . $row1[5] . '\'');
		    				$row2 = mysqli_fetch_row($result);
		    				?>
		    				<label class="form-label"><?php echo $row2[0] ?>, </label>

		    				<?php
		    				$result = $mysqli->query('SELECT DNAME FROM Dunit WHERE DNUM = \'' . $row1[6] . '\'');
		    				$row2 = mysqli_fetch_row($result);
		    				?>
		    				<label class="form-label"><?php echo $row2[0] ?>, </label>

		    				<?php
		    				$result = $mysqli->query('SELECT WNAME FROM Wheel WHERE WNUM = \'' . $row1[7] . '\'');
		    				$row2 = mysqli_fetch_row($result);
		    				?>
		    				<label class="form-label"><?php echo $row2[0] ?></label>

		    			</div>
					</div>
					<div class="col-sm-3">
						<h4 class="form-label"><?php echo $row1[9] ?> рублей</h4>
					</div>
				</div>
			</a>
		<?php endfor; ?>

	</div>
	</form>
</body>