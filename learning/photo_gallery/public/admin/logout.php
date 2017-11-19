<?php 
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
$session->logout();
redirect_to("login.php");
?>
