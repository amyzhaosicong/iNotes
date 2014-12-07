<?php session_start(); ?>

<?php

if (!isset($_SESSION['uid']) || ($_GET['cid'] == "")) {
	header("Location: login.php");
	exit();
} 

$cid = $_GET['cid'];
$tid = $_GET['tid'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<title> post reply </title>
</head>

<body>

<div id="wrapper">

<h2> Create Topic </h2>
<?php

echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a> ";

?>

<hr />

<div id="content">

<form action="post_reply_parse.php" method="post">

<p>reply content</p>

<textarea name="reply_content" rows="5" cols="75"> </textarea>
<br/>
<input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
<input type="hidden" name="tid" value="<?php echo $tid; ?>"/>
<input type="submit" name="reply_submit" valu="Post Your Reply"/>

</form>

</div>
</div>

</body>

</html>