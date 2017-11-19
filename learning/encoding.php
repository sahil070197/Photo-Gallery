<!DOCTYPE html>
<html>
<head>
	<title>Encoding</title>
</head>
<body>
<?php
$linktext="<Click> you will see"; 
$url_page='php/created/page/url.php';
$param2='"bad" / <> characters$';
$param1="this is a string";
 $url="http://localhost/";
 $url .=rawurlencode($url_page);
 $url .="?param1=".urlencode($param1);
 $url .="&param2=".urlencode($param2);
 ?>
<a href="<?php echo htmlspecialchars($url);?>"><click><?php echo htmlspecialchars($linktext) ?></a>
</body>
</html>