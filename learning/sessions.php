

<?php 
session_start();
?>
	<?php
	$_SESSION['name']="kevin";
	$_SESSION['last_name']="abc";
	$name=$_SESSION['name'];
	echo "$name";
	?>