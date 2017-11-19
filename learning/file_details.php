<?php
$file='file_test.php';
echo filesize($file);
//filectime->changed time
//filemtime->modified itme
//fileatime->last accessed time
// echo strftime('%d/%m/%Y %H:%M:%S', filemtime($file));
echo "<br/>".strftime("%d/%m/%Y %H:%M:%S",filemtime($file));
echo "<br/>".strftime("%d/%m/%Y %H:%M:%S",filectime($file));
echo "<br/>".strftime("%d/%m/%Y %H:%M:%S",fileatime($file));
// touch($file);
?>