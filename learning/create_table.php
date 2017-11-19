<?php
	include 'db_connect.php';
	$sql="Create table products(id int(6), first_name varchar(30), last_name varchar(30));";
	if(mysqli_query($connection,$sql))
	{
		echo "successfully created";
	}
	else
		{
			echo "error in creating table".mysqli_error($connection);
		}
		
?>