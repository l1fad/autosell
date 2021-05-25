<?php
include 'classes/user.php';
include 'classes/register.php';
$user = new User();
if(isset($_POST['rlogin']))
{
	$register = new Register($_POST['rlogin'], $_POST['phone'], $_POST['email'], $_POST['password']);
}

?>