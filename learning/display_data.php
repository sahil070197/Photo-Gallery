<?php
include("db_connect.php");
$result=array();
$query_to_select="Select id, first_name, last_name from products;";
$result=mysqli_query($connection,$query_to_select);
?>
<pre>
<?php
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
{

	echo "id: ".$row['id']."<br/>";echo "f_name: ".$row['first_name']."<br/>";echo "last_name: ".$row['last_name']."<br/>";
}}
else
{
	echo mysql_connect_error($connection);
}
mysqli_close($connection);
	?>
	</pre>