<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<pre>
<?php 
	 htmlspecialchars( print_r($_GET));
	$var=$_GET['id'];
	$var2=$_GET['name'];
	echo ($var) ." ".($var2);

	//echo $id;
?>
<br/>
<?php
	$str="sahil singla";
	echo urlencode($str);
	echo "<br/>";
	echo rawurlencode($str);
?>
</pre>
</body>
</html>