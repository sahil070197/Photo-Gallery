<?php
header("Location: firstpage.php"); 
exit;//must be here to not to allow any other headers to be executed// 
// output buffering is turned on,it allows headers //o be sent even if written after body as they must be written in the beginning.
//suggested to write on the top.
//example in login pages.
?>
<html>
<head>
	<title>Headers</title>
</head>
<body>
<?php
header("Location: firstpage.php"); 
exit;//must be here to not to allow any other headers to be executed// 
// output buffering is turned on,it allows headers //o be sent even if written after body as they must be written in the beginning.
//suggested to write on the top.
//example in login pages.
?>
</body>
</html>