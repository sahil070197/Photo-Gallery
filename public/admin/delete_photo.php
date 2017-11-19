<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
if(!$session->is_logged_in())
{
    redirect_to("login.php");
}

$photo=new photograph();
if(isset($_GET['id']))
{
    $photo=  photograph::find_by_id($_GET['id']);
    $photo->delete();
    $session->message("Deletion Successful.");
    
}
    
?>
<?php     redirect_to("display_photos.php");
?>


 