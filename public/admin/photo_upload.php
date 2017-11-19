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
?>
<?php
$max_file_size=1048576;
$message="";
if(isset($_POST['submit']))
{  
    $photo=new photograph();
    $photo->caption=$_POST['caption'];
    $photo->attach_file($_FILES['file_upload']);
    if($photo->save())
    {
        create_log("login_logout_logs.php", "Photo Upload - ID:".$photo->id);
       $message="Upload Successful";
       $session->message($message);
       redirect_to("display_photos.php");
    }
 else {
        $message=join("<br/>",$photo->error);
    }
        
}
    
 ?>

        <?php
   include_layout_template("admin_header.php");
?>
<h2>
    Photo Gallery
</h2>
<?php echo output_message($message)?>
<form action="photo_upload.php" enctype="multipart/form-data" method="POST" id="form">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>"/>
    <p> <input type="file" name="file_upload" /></p>
    <p>
        Caption:</p>
    <p>
        <textarea rows="5" cols="50" form="form" name="caption"></textarea>
    </p>
    <p><input type="submit" value="Upload" name="submit"/></p>
</form>
    
<?php include_layout_template("admin_footer.php"); ?>