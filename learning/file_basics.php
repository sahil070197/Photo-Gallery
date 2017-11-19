<?php
$owner_id= fileowner('class1.php');
$owner_array=posix_getpwuid($owner_id);
echo $owner_array['name'];
?>