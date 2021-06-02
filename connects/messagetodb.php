<?php 

	if(isset($_POST['sendmessage']) and $_POST['sendmessage'] != 0)
	{
		$time = date("d.m.y");

		$mysqli->query('INSERT INTO Message (MADNUM, MUNUM, MDATE, MVAL) 
        	VALUES (\'' . $_POST['sendmessage'] . '\', \'' . $user->getnum() . '\', \'' . $time . '\', 
        	\'' . $_POST['message'] . '\')');
		header("Location: http://localhost/autosell/index.php?Ad=".$_POST['sendmessage']);
	}

?>