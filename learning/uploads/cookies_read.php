<<!DOCTYPE html>
<html>
<head>
	<title>
		Reading cookies
	</title>
</head>
<body>
<?php
$var1=0;
if(isset($_COOKIE['test']))
$var1=$_COOKIE['test'];

echo $var1;
?>
//delete the cookie
<?php
setcookie('test',0,time()-60*60*24*7);
?>
</body>
</html>