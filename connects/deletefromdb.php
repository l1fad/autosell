<?php 

	if(isset($_POST['delete']) and $_POST['delete'] != 0)
	{
		global $mysqli;
		
		$result = $mysqli->query('SELECT QIMG FROM Ad WHERE ADNUM = \'' . $_POST['delete'] . '\'');
		$q = mysqli_fetch_row($result);

		$result = $mysqli->query('SELECT INAME FROM Img WHERE IADNUM = \'' . $_POST['delete'] . '\'');

		for($i = 1; $i <= $q[0]; $i++)
		{
			$img = mysqli_fetch_row($result);		
			unlink("img/".$img[0]);

		}

		$mysqli->query('DELETE FROM Img WHERE IADNUM = \'' . $_POST['delete'] . '\' ');
		$mysqli->query('DELETE FROM Ad WHERE ADNUM = \'' . $_POST['delete'] . '\' ');

		echo "Объявление успешно удалено";	

	}

?>