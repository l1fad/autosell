<?php 

	if(isset($_POST['add']))
	{
		global $mysqli;

        $mysqli->query('INSERT INTO Ad (ADNAME, UNUM, MNUM, ADPRICE, ADDESCRIPTION, ENUM, EVAL, TNUM, DNUM, WNUM, MILVAL, ADYEAR, ADPOWER) 
        	VALUES (\'' . $_POST['title'] . '\', \'' . $user->getnum() . '\', \'' . $_POST['model'] . '\', 
        	\'' . $_POST['price'] . '\', \'' . $_POST['description'] . '\', \'' . $_POST['engine'] . '\', 
        	\'' . $_POST['engineval'] . '\', \'' . $_POST['transmission'] . '\', \'' . $_POST['unit'] . '\',
        	\'' . $_POST['wheel'] . '\', \'' . $_POST['mileage'] . '\', 
        	\'' . $_POST['year'] . '\', \'' . $_POST['enginepower'] . '\')');
        
	}
?>