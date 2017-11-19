<?php
$file="../photo_gallery/logs/login_logout_logs.php";
if($handle=fopen($file,'r'))
{//read
	$content=fread($handle, filesize($file));//each character reads 1 byte(english)
	echo nl2br($content);
	$con=file_get_contents($file);
	echo nl2br($content);
	$per_line="";
	while(!feof($handle))
	{

		$per_line.=fgets($handle);
	}
	echo $per_line;
	fclose($handle);
}
?>