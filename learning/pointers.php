<!DOCTYPE html>
<html>
<head>
	<title>pointers</title>
</head>
<body>
<?php
$ages=array(4,8,15,16,23,42);
echo "1:".current($ages)."<br>";
next($ages);
echo "2: ".current($ages);
reset($ages);
echo "<br>".current($ages);
while ($age=current($ages)) {
	echo "<br>".$age;
	next($ages);
}
?>
</body>
</html>