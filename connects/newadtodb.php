<?php 

	if(isset($_POST['add']))
	{
		global $mysqli;

    	for ($i = 1; $i <= $_POST['img_q1']; $i++)
    	{
    		$name = 'image'.$i;
	    	if (isset($_FILES[$name]))
	    	{	
	    		$errors = array();
	    		
	    		$allowed = array("image/jpeg", "image/jpg", "image/png");
	    		if(!in_array($_FILES[$name]['type'], $allowed)) 
	    		{
				  $errors[] = 'Ошибка добавления нового объявления, формат загружаемого файла не jpeg, jpg или png';
				}

				if($_FILES[$name]['size'] > 2097152)
				{
					$errors[] = 'Ошибка добавления нового объявления, файл не должен превышать 2 МБ';
				}
				if (empty($errors) != true)
				{
					break;
	    		}
	    	}
    	}

    	if (empty($errors) == true)
		{
	    	$mysqli->query('INSERT INTO Ad (ADNAME, UNUM, MNUM, ADPRICE, ADDESCRIPTION, ENUM, EVAL, TNUM, DNUM, WNUM, MILVAL, ADYEAR, ADPOWER, QIMG) 
	        	VALUES (\'' . $_POST['title'] . '\', \'' . $user->getnum() . '\', \'' . $_POST['model'] . '\', 
	        	\'' . $_POST['price'] . '\', \'' . $_POST['description'] . '\', \'' . $_POST['engine'] . '\', 
	        	\'' . $_POST['engineval'] . '\', \'' . $_POST['transmission'] . '\', \'' . $_POST['unit'] . '\',
	        	\'' . $_POST['wheel'] . '\', \'' . $_POST['mileage'] . '\', 
	        	\'' . $_POST['year'] . '\', \'' . $_POST['enginepower'] . '\', \'' . $_POST['img_q1'] . '\')');
    	}

    	$result = $mysqli->query('SELECT MAX(ADNUM)  FROM Ad ');
    	$row = mysqli_fetch_row($result);

    	for ($i = 1; $i <= $_POST['img_q1']; $i++)
    	{
    		$name = 'image'.$i;
	    	if (isset($_FILES[$name]))
	    	{	
				if (empty($errors) == true)
				{
	    			move_uploaded_file($_FILES[$name]['tmp_name'], "img/".$row[0]."_".$i.".jpeg");
	    		}
	    		else
	    		{
	    			foreach ($errors as $k) 
	    			{
						echo $k . "<br>\r\n";
					}
					break;
	    		}
	    	}
    	}

    	if (empty($errors) == true)
		{
			echo "Объявление успешно добавлено";
		}
	}
?>