<!DOCTYPE html>
<html>
<head>
	<title>Self encoded</title>
</head>
<body>
<?php
$pagelink="proj/secondpage.php";
$param1=htmlspecialchars("i am a <click> newbie to php<click>");
$param2="2 time login @ this page;";
$url="http://localhost/";
echo $param1;
$url .=($pagelink);
$url .="?name=".urlencode($param1);
$url .="&id=".urlencode($param2);
?>
<a href="<?php echo htmlspecialchars($url); ?>">You will be successful</a>
</body>
</html>