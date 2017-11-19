<?php 
include ("config.php");
$connection=mysqli_connect( SERVER,USERNAME,PASSWORD,DATABASE);
if(($connection))
{
	echo "connection successful";
}
else
{
	echo "faliure";
}
?>