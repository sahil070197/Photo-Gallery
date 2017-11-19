<!DOCTYPE html>
<html>
<head>
	<title>First page</title>
</head>
<body>
<?php
$linktext="<Click> you will see"; 
 ?>
Intitially : <a href="secondpage.php?name=<?php echo urlencode("sahil singla");?> &id=1"><click> you will see</a>
Finally: <a href="secondpage.php?name=<?php echo urlencode("sahil singla");?> &id=1"><click><?php echo htmlspecialchars($linktext) ?></a>
</body>
</html>