<?php
	
$host = "localhost";
$user = "root";
$pass = "";
$db = "inotes";

mysql_connect($host, $user, $pass);
mysql_select_db($db);

if (isset($_POST['username'])){

	$username = $_POST['username'];
	$password = $_POST['password'];


	$sql="SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1 ";
	$res = mysql_query($sql);
	if (mysql_num_rows($res) == 1 ) {
		echo "you have successfully logged in";
		exit();
	} else {
		echo "invalid login information";
		exit();
	}

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> test login </title>
</head>

<body>
<form method = "post" action = "login.php">
Username: <input type="text" name="username"/> </br>
Password: <input type="password" name="password"/></br>
<input type="submit" name="submit" value="Log In"/>
</form>
</body>

</html>