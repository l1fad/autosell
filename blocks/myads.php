<body>
	
	
		<div class="container">
		<form action="/autosell/index.php" method="GET" >
		<h3 class="display-4 fw-normal mb-5 text-center">Мои объявления</h3>
		<?php 
		global $mysqli;
		$result = $mysqli->query('SELECT MAX(ADNUM)  FROM Ad ');

		$row = mysqli_fetch_row($result);

		$j = 0;
		for($i = 1; $i <= $row[0]; $i++):
  			
  			$result = $mysqli->query('SELECT MNUM, ADYEAR, EVAL, ADPOWER, ENUM, TNUM, DNUM, WNUM, MILVAL, ADPRICE, UNUM FROM Ad WHERE ADNUM = \'' . $i . '\'');
  			
  			$row1 = mysqli_fetch_row($result);
  			
			if (isset($row1[0]))
			{			
				
				
				if ($row1[10] == $user->getnum())
				{
					$j++;
					if ($j <= $_GET['Myads']*10 and $j > ($_GET['Myads'] - 1) * 10)
					{
				?>
						<button name = "Ad" value = "<?php echo $i ?>" class = "btn btn-outline-primary2 mb-2 mr-5">
							<div class="row">
								<div class="col-sm-3 ">
									<?php
									$result = $mysqli->query('SELECT INAME FROM Img WHERE IADNUM = \'' . $i . '\'');

									$img = mysqli_fetch_row($result);
									?>
									<img src = img/<?php echo $img[0] ?> width="240" height="180"> </img>
								</div>

								
								<div class="col-sm-6">
									<?php

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
						</button>

		<?php   	}
				}
						
			}
	
		endfor; ?>
		</form>

		<form action="/autosell/index.php" method="GET" >
			<div class="col-sm ">
			<?php
				
			for($i = 0; $i < $j / 10; $i++)
			{	?>	
				<button type="submit" name="Myads" class="btn pages btn-success" value = "<?php echo $i+1 ?>"><?php echo $i+1 ?>
				</button>

	 <?php } ?>
  			</div>
  		</form>
	</div>
	
</body>