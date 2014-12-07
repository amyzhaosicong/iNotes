<?php

session_start();
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['note_id'];

include_once("connect.php");
$sql = "UPDATE notes SET title='".$title."', content='".$content."' WHERE id='".$id."' ";

$res = mysql_query($sql) or die(mysql_error());

header("Location: main.php");

?>