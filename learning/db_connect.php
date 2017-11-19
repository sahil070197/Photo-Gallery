<?php
 

 include("db_config.php");
 $connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
 if(!$connection)
{
    die("connection Error : ".mysqli_connect_error());
}
else
{
    echo "connection successful to ".DB_DATABASE;
}
 
?>
