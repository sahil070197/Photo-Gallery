<?php
$file='filetest.php';
if($handle=fopen($file, 'w'))
{//overwrites anderases already existing data
	//use 'a' for apeending
	echo "Successful";
	fwrite($handle, '123tabc');
	file_put_contents($file, "heyyaa");
	
	fclose($handle);
}
else
{
	echo "failed";
}

?>