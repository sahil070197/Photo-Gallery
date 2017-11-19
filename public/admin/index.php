<?php
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
if (!$session->is_logged_in()) {
redirect_to("login.php");
}
    include_layout_template("admin_header.php");
    
?>
		<h2>Menu</h2>
		<br/>
		<p><a href="logout.php">LOGOUT</a></p>
		<p><a href="display_logs.php?clear=1" onclick="confirm("Sure to clear all logs");">Clear Logs</a></p>
		<p><a href="display_logs.php">Display Logs</a></p>
                <p><a href="photo_upload.php">Upload Photo</a></p>
                <p><a href="display_photos.php">Display Photographs</a>
		<?php include_layout_template("admin_footer.php"); ?>