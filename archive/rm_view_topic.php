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
$cid = $_GET['cid'];
$tid = $_GET['tid'];
$sql = "SELECT * FROM topics WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
$res = mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($res)==1) {
	echo "<table width = '100%'>";
	if ($_SESSION['uid']) {
		echo "<tr><td colspan='2' ><input type='submit' value='Add Reply' onClick=\"window.location = 'post_reply.php? cid=".$cid."&tid=".$tid."'\" >"
		."\t    <input type='submit' value='Browse Categories' onClick=\"window.location = 'main.php'\" > <hr/></td></tr>";
		while ($row = mysql_fetch_assoc($res)) {
			$sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' ";
			$res2 = mysql_query($sql2) or die (mysql_error());

			while ($row2 = mysql_fetch_assoc($res2)) {
				echo "<tr><td valign='top' style='border: 1px solid #000000;'> <div style='min-height: 125px;'>".$row['topic_title']."<br/>"
				."by ".$row2['post_creator']." - ".$row2['post_date']."<hr/>".$row2['post_content']." </div></td>"
				/*."<td width='200' valign='top' align='center' style='border: 1px solid $000000;'>User Info Here </td></tr>"*/
				."<tr><td colspan='2'><hr/> </td></tr>";
			}

			$old_views = $row['topic_views'];
			$new_views = $old_views + 1;
			$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1 ";
			$res3 = mysql_query($sql3) or die(mysql_error());

		}

	} else {

		echo "<tr><td colspan='2' ><p> please log in to add your response</p></td><\tr>";
	}
	echo "</table>";
} else {
	echo "[".$sql."]";

	echo "<p>This topic does not exist";
}

?>

</div>
</div>

</body>

</html>