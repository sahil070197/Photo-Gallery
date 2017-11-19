<?php
$file='filetest.php';
if($handle=fopen($file, 'w'))
{
	echo "Successful";
}
else
{
	echo "failed";
}

fclose($handle);
?>