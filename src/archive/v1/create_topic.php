<?php session_start(); ?>

<?php

if (!isset($_SESSION['uid']) || ($_GET['cid'] == "")) {
	header("Location: login.php");
	exit();
} 

$cid = $_GET['cid'];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<title> Create Forum Topic </title>
</head>

<body>

<div id="wrapper">

<h2> Create Topic </h2>
<?php

echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a> ";

?>

<hr />

<div id="content">
<form action="create_topic_parse.php" method="post" >
<p>Topic Title</p>
<input type="text" name="topic_title" size="98" maxlength="150" />
<p>Topic Content</p>

<textarea name="topic_content" rows="5" cols="75"> </textarea>
<br/><br/>
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="submit" name="topic_submit" value="Create your topic"/>


</form>
</div>
</div>

</body>

</html>