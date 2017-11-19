<<!DOCTYPE html>
<html>
<head>
	<title>Include</title>
</head>
<body>
<?php
require_once("included_func.php");
//if included once then wont be included ever again.(Functions can be declared only once but if multiple files hazving same function are included within same then it will be a mess.)?>
<?php
hello("Include and require are two functions. require is used when function to be included is must required but in case of non essentialness include shall be used.");
?>

</body>
</html>