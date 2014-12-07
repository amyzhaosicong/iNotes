<?php
$host="localhost";
$username="root";
$password="";
$db="inotes";

mysql_connect($host, $username, $password) or die(mysql_error());
mysql_select_db($db);
?>