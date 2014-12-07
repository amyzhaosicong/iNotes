<?php

session_start();
$id = $_GET['id'];

include_once("connect.php");
$sql = "DELETE FROM notes WHERE category_id='".$id."'";

$res = mysql_query($sql) or die(mysql_error());


$sql = "DELETE FROM categories WHERE id='".$id."'";

$res = mysql_query($sql) or die(mysql_error());

header("Location: main.php");

?>