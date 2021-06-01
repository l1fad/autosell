<body>
	
	
		<div class="container">
		<form action="/autosell/index.php" method="GET" >	
		<?php 
		global $mysqli;
		$result = $mysqli->query('SELECT MAX(ADNUM)  FROM Ad ');

		$row = mysqli_fetch_row($result);

		if ($_GET['yearlow'] > $_GET['yearhigh'])
		{
			$tmp = $_GET['yearlow'];
			$_GET['yearlow'] =  $_GET['yearhigh'];
			$_GET['yearhigh'] = $tmp;
		}

		if ($_GET['pricelow'] > $_GET['pricehigh'])
		{
			$tmp = $_GET['pricelow'];
			$_GET['pricelow'] =  $_GET['pricehigh'];
			$_GET['pricehigh'] = $tmp;
		}

		if ($_GET['mileagelow'] > $_GET['mileagehigh'])
		{
			$tmp = $_GET['mileagelow'];
			$_GET['mileagelow'] =  $_GET['mileagehigh'];
			$_GET['mileagehigh'] = $tmp;
		}

		if ($_GET['enginevallow'] > $_GET['enginevalhigh'])
		{
			$tmp = $_GET['enginevallow'];
			$_GET['enginevallow'] =  $_GET['enginevalhigh'];
			$_GET['enginevalhigh'] = $tmp;
		}

		if ($_GET['powerlow'] > $_GET['powerhigh'])
		{
			$tmp = $_GET['powerlow'];
			$_GET['powerlow'] =  $_GET['powerhigh'];
			$_GET['powerhigh'] = $tmp;
		}
		
		$j = 0;
		for($i = 1; $i <= $row[0]; $i++):
  			
  			$result = $mysqli->query('SELECT MNUM, ADYEAR, EVAL, ADPOWER, ENUM, TNUM, DNUM, WNUM, MILVAL, ADPRICE FROM Ad WHERE ADNUM = \'' . $i . '\'');
  			
  			$row1 = mysqli_fetch_row($result);
  			
			if (isset($row1[0]))
			{			
				
				
				if ($row1[1] >= $_GET['yearlow'] and $row1[1] <= $_GET['yearhigh'] and
					$row1[2] >= $_GET['enginevallow'] and $row1[2] <= $_GET['enginevalhigh'] and
					$row1[3] >= $_GET['powerlow'] and $row1[3] <= $_GET['powerhigh'] and
					$row1[4] == $_GET['Engine'] and
					$row1[5] == $_GET['Transmission'] and
					$row1[7] == $_GET['Wheel'] and
					$row1[8] >= $_GET['mileagelow'] and $row1[8] <= $_GET['mileagehigh'] and
					$row1[9] >= $_GET['pricelow'] and $row1[9] <= $_GET['pricehigh'])
				{
					if ($row1[0] == $_GET['Model'])
					{
						$j++;
						if ($j <= $_GET['send1']*10 and $j > ($_GET['send1'] - 1) * 10)
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
		<?php   	 
						}
					}
					else
					{
						if ('Any' == $_GET['Model'] )
						{ 

							$result = $mysqli->query('SELECT MNAME, BNUM FROM Model WHERE MNUM = \'' . $row1[0] . '\'');
							$row2 = mysqli_fetch_row($result);

							$result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $row2[1] . '\'');
							$row3 = mysqli_fetch_row($result);
							
							if ($_GET['Brand'] == $row3[0])
							{
								$j++;
								if ($j <= $_GET['send1']*10 and $j > ($_GET['send1'] - 1) * 10)
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


				<?php   		}
							}
						}

					}
				}
			}	
		endfor; ?>
		</form>
	
		<form action="/autosell/index.php" method="GET" >
			<input type="hidden" name="Brand" value="<?php echo $_GET['Brand']?>">
			<input type="hidden" name="Model" value="<?php echo $_GET['Model']?>">
			<input type="hidden" name="pricelow" value="<?php echo $_GET['pricelow']?>">
			<input type="hidden" name="pricehigh" value="<?php echo $_GET['pricehigh']?>">
			<input type="hidden" name="yearlow" value="<?php echo $_GET['yearlow']?>">
			<input type="hidden" name="yearhigh" value="<?php echo $_GET['yearhigh']?>">
			<input type="hidden" name="mileagelow" value="<?php echo $_GET['mileagelow']?>">
			<input type="hidden" name="mileagehigh" value="<?php echo $_GET['mileagehigh']?>">
			<input type="hidden" name="enginevallow" value="<?php echo $_GET['enginevallow']?>">
			<input type="hidden" name="enginevalhigh" value="<?php echo $_GET['enginevalhigh']?>">
			<input type="hidden" name="powerlow" value="<?php echo $_GET['powerlow']?>">
			<input type="hidden" name="powerhigh" value="<?php echo $_GET['powerhigh']?>">
			<input type="hidden" name="Transmission" value="<?php echo $_GET['Transmission']?>">
			<input type="hidden" name="Engine" value="<?php echo $_GET['Engine']?>">
			<input type="hidden" name="Wheel" value="<?php echo $_GET['Wheel']?>">
			<div class="col-sm ">
			<?php	
			for($i = 0; $i < $j / 10; $i++)
			{	?>	
				<button type="submit" name="send1" class="btn pages btn-success" value = "<?php echo $i+1 ?>"><?php echo $i+1 ?>
				</button>

	 <?php } ?>
			</div>
		</form>
	</div>
	
</body>