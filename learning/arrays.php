<html>
<head>
<title>
Arrays
</title>
</head>
<body>
<?php
$array1=array(4,8,20,2,25);
echo $array1[0];
$array2=array(6,"foz","dog",array("0","2","3"));
echo "</br>";
echo $array2[3][1];	 
echo '</br>';
$array3=array("first_name" => "Sahil", "last_name" => "Singla");
echo $array3["first_name"]. " ".$array3["last_name"]."</br>";
echo $array3["first_name"]. " ".$array3["last_name"]."</br>";
$array3["first_name"]="sagar";
echo $array3["first_name"]. " ".$array3["last_name"]."</br>";
?>
<pre>
<?php 
echo print_r($array2[3]);
?>
</br>
<?php
rsort($array1);
echo print_r($array1);
$imploded_string=implode(" * ",$array1);
echo '<br/>'.$imploded_string.'<br/>';
print_r(explode(" * ",$imploded_string));
echo "in_array: ".in_array(0,$array1);
// above function will show nothing if the element is not present
//in the array but will show 1 if its present.
//string search could also be done.
?>
</pre>
</body>
</html>