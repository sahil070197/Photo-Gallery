<?php
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
if (!$session->is_logged_in()) {
redirect_to("login.php");
}
$path=SITE_ROOT.DS."logs/login_logout_logs.php";
include_layout_template("admin_header.php");
?>
<h2>Log Files</h2>
<hr/>
<?php
 
if(file_exists($path))
{
	
	$handle=fopen($path, 'r');
	if(isset($_GET['clear']))
	{
		file_put_contents($path, "");
		create_log("login_logout_logs.php","LOGIN",$_SESSION['full_name']);
	}
	
	$con=fread($handle, filesize($path));
	echo nl2br($con);
	fclose($handle);
}
else
{
	echo "Log files do no exist.<br/>";
}
?>
<p><a href="index.php">Back</a></p>
 <?php
 include_layout_template("admin_footer.php");
 ?>