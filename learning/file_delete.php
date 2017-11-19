<?php

if(unlink("filetest.php"))
{
	echo "successful.php";
}
else
{
	echo "failed";
}

?>