<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<title> create category </title>
</head>

<body>

<div id="wrapper">

<h2> category page </h2>

<?php
session_start();

if (!isset($_SESSION['uid'])) {
	echo "<form action='login_parse.php' method='post'>
	Username: <input type='text' name='username'/>&nbsp;
	Password: <input type='password' name='password'/>&nbsp;
	<input type='submit' name='submit' value='Log In'>
	";
} else {
	echo "<p> logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a> ";
}


?>


<hr />

<div id="content">

<?php

include_once("connect.php");
$cid = 	$_GET['cid'];

if (isset($_SESSION['uid'])) {
	$logged = " | <a href='create_topic.php?cid=".$cid."'>Click Here to Create A Topic</a>";

} else {
	$logged = " | Please log in to create topics in this forum";
}


$sql= "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
$res = mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($res) == 1) {
	$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
	$res2 = mysql_query($sql2) or die(mysql_error());

	if (mysql_num_rows($res2) > 0) {
		$topics = "";
		$topics .= "<table width='100%' style='border-collapse: collapse;' >";
		$topics .= "<tr><td colspan='3'><a href='main.php'>Return to Forum Index</a>".$logged."<hr /></td></tr>";
		$topics .= "<tr style='background-color: #dddddd;'><td>Topic Title</td><td width='65' align='center'> Replies</td><td width='65' align='center'> Views</td></tr>";
		$topics .= "<tr><td colspan='3'><hr/></td></tr>";

		while ($row = mysql_fetch_assoc($res2)) {
			$tid = $row['id'];
			$title = $row['topic_title'];
			$views = $row['topic_views'];
			$date = $row['topic_date'];
			$creator = $row['topic_creator'];
			$topics .= "<tr><td><a href='view_topic.php?cid=".$cid." & tid=".$tid."'>".$title."</a><br/> <span class='post_info'>Postedby:".$creator. " on ".$date."</span></td>".
						"<td align='center'>0</td><td align='center'>.$views.</td></tr>";
			$topics .= "<tr><td colspan='3'> <hr/></td></tr>";

		}

		$topics .="</table>";
		echo $topics;

	} else {
		echo "<a href='main.php'> Return to Forum Index </a><hr/>";
		echo "<p> There are no topics in this category yet.".$logged." </p>";
	}

} else {
	echo "<a href='main.php'> Return to Forum Index </a><hr/>";
	echo "<p> You are trying to view a category that does not exist yet </p>";
}

?>

</div>
</div>

</body>

</html>