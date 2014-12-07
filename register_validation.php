<?php

	$value = $_GET['query'];
	$formfield = $_GET['field'];
	$msg = "";
	if (strlen($value) == 0) {
		$msg = $formfield . " cannot be empty";
		exit($msg);
	}

	// Check Valid or Invalid user name when user enters user name in username input field.
	if ($formfield == "username") {
		include_once("connect.php");
		$sql = "SELECT * FROM users WHERE username='".$value."'";
		$res = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($res) > 0) {
			$msg = "user already exists, please register with another email";
			exit($msg);
		} else 	{
			$msg = "Y";
			exit($msg);
		}
	}

	// Check Valid or Invalid password when user enters password in password input field.
	if ($formfield == "password") {
	if (strlen($value) < 6) {
		echo "Password too short";
		} else {
		echo "Y";
		}
	}

	// Check Valid or Invalid email when user enters email in email input field.
	if ($formfield == "email") {
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
			$msg = "Invalid email Format";
			exit($msg);
		} 

		include_once("connect.php");
		$sql = "SELECT * FROM users WHERE email='".$value."'";
		$res = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($res) > 0) {
			$msg = "email already exists, please register with another email";
			exit($msg);
		} else 	{
			$msg = "Y";
			exit($msg);
		}
	}

?>