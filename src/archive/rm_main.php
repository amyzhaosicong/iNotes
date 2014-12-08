<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<title> login </title>
</head>

<body>

<div id="wrapper">

<h2> login page </h2>

<?php
session_start();

if (!isset($_SESSION['uid'])) {
	echo "<form action='login_parse.php' method='post'>
	Username: <input type='text' name='username'/>&nbsp;
	Password: <input type='password' name='password'/>&nbsp;
	<input type='submit' name='submit' value='Log In'>";
} else {
	echo "<p> logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a> ";
}


?>


<hr />

<div id="content">
<?php
include_once("connect.php");
$sql = "SELECT * FROM categories ORDER BY category_title ASC";
$res = mysql_query($sql) or die(mysql_error());

$categories = "";

if (mysql_num_rows($res)>0) {
	while ($row = mysql_fetch_assoc($res)) {
		$id = $row['id'];
		$title = $row['category_title'];
		$description = $row['category_description'];
		$categories .= "<a href='view_category.php?cid=".$id."' class='cat_links'>".$title." -<font size='-1'>".$description."</a>";
	}

	echo $categories;

} else {
	echo "<p>no category available yet\n</p>";
}

?>
</div>
</div>

</body>

</html>