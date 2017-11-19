<?php
$servername = "localhost";
$username = "root";
$password = "sahil12345";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Hurray !! Finally connected!!";
//2. connecting to database;
$sql="Create database myDB";
if (mysqli_query($conn,$sql)) {
	echo "database created successfully";
}
else
{
 	echo "Error in createing database".mysqli_error($conn);
}
mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Basic</title>
</head>
<body>

</body>
</html>