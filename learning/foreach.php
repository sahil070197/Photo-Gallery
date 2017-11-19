<title>
Foreach loop
</title>
<?php
//used for looping through thew arrays without using
//their count;
  $array1=array(1,2,3,4,5);
  foreach($array1 as $i)
  {
	  echo $i."<br>";
  }
  $array2=array("age1"=>1,"age2"=>2,"age 3"=>3);
  foreach($array2 as $key=>$value)
  {
	  echo $key." ".$value."<br>";
  }
  //this is a dynamic method_will be used in databse management;
  ?>