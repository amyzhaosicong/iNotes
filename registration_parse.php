<?php

$uname = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

include_once("connect.php");
$sql = "INSERT INTO users (username, password, email) VALUES ('".$uname."', '".$pass."', '".$email."')";

$res = mysql_query($sql) or die(mysql_error());

$id = mysql_insert_id();

session_start();
$_SESSION['uid'] = $id;

header("Location: main.php");

?>