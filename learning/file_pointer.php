<?php
	$file="file_test.php";
	$handle=fopen($file, 'w');
	if($handle)
		{
			fwrite($handle, "Heya! \nWhat's going on dere?");
			$pos=ftell($handle);
			fseek($handle, $pos-5);
			fwrite($handle, " now ");
		}
		else
		{
			echo "failed";
		}
?>
