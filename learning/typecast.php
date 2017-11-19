<title>
Type Casting
</title>
<?php
$var1="3";
$var2="  brown 4 foxes";
echo $var1+$var2;
echo "<br>".gettype($var1)."<br>".gettype($var2);
settype($var1,"string");
echo $var1+$var2;

?>