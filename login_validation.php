<?php

	$uname = $_GET['username'];
	$pass = $_GET['password'];

	$msg = "";
	if (strlen($uname) == 0) {
		$msg = "username cannot be empty";
		exit($msg);
	}

	if (strlen($pass) == 0) {
		$msg = "password cannot be empty";
		exit($msg);
	}

	include_once("connect.php");
	$sql = "SELECT * FROM users WHERE username='".$uname."' AND password='".$pass."' ";
	$res = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($res) > 0) {
		$msg = "Y";
		exit($msg);
	} else 	{
		$msg = "invalid username or password";
		exit($msg);
	}

?>