<!DOCTYPE html>
<html>
<head>
	<title>functions</title>
</head>
<body>
<?php 
function say_hello()
{
	echo "Say hello";
}
say_hello();
function say_hello2($word)
{
	echo "{$word} <br>";
}
echo "<br>";
say_hello2("Sahil");
 //function can be called anywhere.
 ?>

</body>
</html>