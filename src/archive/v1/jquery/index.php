<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> jquery impl </title>

<script type = "text/javascript" src="jquery.js"> </script>
<script type = "text/javascript">

function toggle(id) {
	if ($('#'+id).is(":hidden")) {
		//hidden
		$('#'+id).slideDown("fast");
	} else {
		$('#'+id).slideUp("fast");
	}
}

</script>
</head>

<body>
<h2>
<p> jquery toggling</p>
<hr>
</h2>


<!-- <a href ="#"> click here for jQuery stuffs</a> -->


<a href="#" onclick="toggle('div1'); return false;">Toggle div1</a>


<div id="div1" style="display:none;">
<h4> div1 </h4>
<p>
	this is the content to be hidden
</p>

</div>

<br>

<a href="#" onclick="toggle('div2'); return false;">Toggle div1</a>


<div id="div2" style="display:none;">
<h4> div2 </h4>
<p>
	this is the other content to be hidden
</p>

</div>



</body>

</html>