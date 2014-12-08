<?php

session_start();
$id = $_GET['id'];

include_once("connect.php");
$db = NoteDB::Instance();
$res = $db->delete_notes_per_category($id);

/*$sql = "DELETE FROM notes WHERE category_id='".$id."'";

$res = mysql_query($sql) or die(mysql_error());*/

$res = $db->delete_category_per_id($id);
/*$sql = "DELETE FROM categories WHERE id='".$id."'";

$res = mysql_query($sql) or die(mysql_error());*/

header("Location: main.php");

?>