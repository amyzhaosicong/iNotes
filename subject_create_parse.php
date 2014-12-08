<?php
session_start();

$category_title = $_POST['category_title'];
$uid = $_SESSION['uid'];

include_once("connect.php");

$db = NoteDB::Instance();
$res = $db->subject_create($category_title, $uid);

/*$sql = "INSERT INTO categories (category_title, user_id, last_post_date) VALUES ('".$category_title."', '".$uid."', now())";

$res = mysql_query($sql) or die(mysql_error());*/
header("Location: main.php");

?>