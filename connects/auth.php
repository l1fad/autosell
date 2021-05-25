<?php
include 'classes/user.php';
include 'classes/register.php';
$user = new User();
if(isset($_POST['rlogin']))
{
	$register = new Register($_POST['rlogin'], $_POST['phone'], $_POST['email'], $_POST['password']);
}
else if(isset($_POST['logout']))
{
	setcookie('login', '', time() - 3600 * 24 * 30 * 6);
	setcookie('password', '', time() - 3600 * 24 * 30 * 6);
	unset($_COOKIE['login']);
	unset($_COOKIE['password']);
	header('Refresh: 0');
}
?>