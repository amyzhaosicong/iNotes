<?php

$word = $_GET['word'];
session_start();
$_SESSION['search_word'] = $word;

header("Location: notes_list.php");

?>