<?php
include("db_connect.php");
$ID=$_POST['ID'];
$first_name=$_POST['First_name'];
$last_name=$_POST['Last_name'];
$insert_record="insert into products (id,first_name,last_name) VALUES({$ID},{$first_name},{$last_name});";
if(mysqli_query($connection,$insert_record))
{
	$name=mysqli_insert_id($connection);
	echo "records inserted successfully name :".$name;
}
else
{
	echo "Error : ".mysqli_error($connection);
}
mysqli_close($connection);
?>