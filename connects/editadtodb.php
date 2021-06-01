<?php 

	if(isset($_POST['edit1']) and $_POST['edit1'] != 0)
	{

		global $mysqli;
		
		$result = $mysqli->query('SELECT QIMG FROM Ad WHERE ADNUM = \'' . $_POST['edit1'] . '\'');

        $q = mysqli_fetch_row($result);

        $result = $mysqli->query('SELECT INAME, INUM FROM Img WHERE IADNUM = \'' . $_POST['edit1'] . '\'');

        $name = 'image'.($q[0]+1);
        $errors = array();
        if($_FILES[$name]['type'] != NULL)
        {	
        	
			for ($i = $q[0]+1; $i <= $_POST['img_q1']; $i++)
	    	{
	    		$name = 'image'.$i;
		    	if (isset($_FILES[$name]))
		    	{	
		    		
		    		
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

	    	

	    	for ($i = $q[0]+1; $i <= $_POST['img_q1']; $i++)
	    	{
	    		$name = 'image'.$i;
		    	if (isset($_FILES[$name]))
		    	{	
					if (empty($errors) == true)
					{
						$filename = $_POST['edit1']."_".$i.rand().".jpeg";
		    			move_uploaded_file($_FILES[$name]['tmp_name'], "img/".$filename);
		    			$mysqli->query('INSERT INTO Img (IADNUM, INAME) 
		    				VALUES (\'' . $_POST['edit1'] . '\', \'' . $filename . '\')');
		    			$q[0] = $_POST['img_q1'];
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
    	}
    	$k = $q[0];
    	for($i = 1; $i <= $k; $i++)
		{
			$img = mysqli_fetch_row($result);
			$name = 'image'.($i);
			if(!isset($_FILES[$name]))
        	{
        		$name = 'imgdel'.$i;
				if ($_POST[$name])
				{
					unlink("img/".$img[0]);
					$mysqli->query('DELETE FROM Img WHERE INUM = \'' . $img[1] . '\' ');
					$q[0] = $q[0] - 1;
				}
        	}
		}


		if (empty($errors) == true)
		{

	    	$mysqli->query('UPDATE Ad SET ADNAME = \'' . $_POST['title'] . '\', MNUM = \'' . $_POST['model'] . '\', 
	    	 	ADPRICE = \'' . $_POST['price'] . '\', ADDESCRIPTION = \'' . $_POST['description'] . '\',
	    	 	ENUM = \'' . $_POST['engine'] . '\', EVAL = \'' . $_POST['engineval'] . '\', 
	    	 	TNUM = \'' . $_POST['transmission'] . '\', DNUM = \'' . $_POST['unit'] . '\', WNUM = \'' . $_POST['wheel'] . '\', 
	    	 	MILVAL = \'' . $_POST['mileage'] . '\', ADYEAR = \'' . $_POST['year'] . '\', 
	    	 	ADPOWER = \'' . $_POST['enginepower'] . '\', QIMG = \'' . $q[0] . '\'
	    	 	WHERE ADNUM = \'' . $_POST['edit1'] . '\'');
	   		echo "Объявление успешно изменено";
    	}

	}

?>