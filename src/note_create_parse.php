<?php
session_start();

$category_id = $_POST['note_category'];
$title = $_POST['title'];
$content = $_POST['content'];

include_once("connect.php");
$db = NoteDB::Instance();
$res = $db->note_create($content, $title, $category_id);

/*$sql = "INSERT INTO notes (content, title, category_id) VALUES ('".$content."', '".$title."', '".$category_id."')";

$res = mysql_query($sql) or die(mysql_error());*/
header("Location: main.php");

?>