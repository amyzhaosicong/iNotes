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
	$db = NoteDB::Instance();
	$res = $db->user_per_id_pass($uname, $pass);

	
	if (mysql_num_rows($res) > 0) {
		$msg = "Y";
		exit($msg);
	} else 	{
		$msg = "invalid username or password";
		exit($msg);
	}

?>