<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $upload_error=array(
      '0'=>'No errors.',
      '1'=>'Larger than maximum upload php limit.',
      '2'=>'Larger than form upload limit.',
      '3'=>'Partial Upload',
      '4'=>'No files',
      '6'=>'No Temporary Directory.',
      '7'=>'Can\'t Write to disc',
      '8'=>'File stopped by extention');
    if(isset($_POST['submit']))
    {  
        $error=$_FILES['file_upload']['error'];
        $tmp_file=$_FILES['file_upload']['tmp_name'];
        $target_file=  basename($_FILES['file_upload']['name']);
        $upload_dir="uploads";
        //error checking..
      
        if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file))
        {
            $message="Upload Successful";
        }
        else
        {
             $message="Error in uploading";
        }
        
    }
           

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(!empty($message))
            {
                echo "<p>".$message."</p>";
                
            } 
        ?>
        <form action="upload.php" enctype="multipart/form-data" method="POST">
            <?php //maximum file size must be specified ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
            <input type="file" name="file_upload"/>
            <input type="submit" name="submit" value="Upload"/>
            
        </form>
    </body>
</html>
