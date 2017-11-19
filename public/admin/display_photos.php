<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
$message=null;
if(!$session->is_logged_in())
{
	redirect_to("index.php");
}
include_layout_template("admin_header.php");
    $per_page=4;
    $total_count=  photograph::count_all();
    
if(!isset($_GET['page']) || empty($_GET['page']))
{
    $page=1;
}
else
{
    $page=$_GET['page'];
}
$pagination=new Paginantion($page,$per_page,$total_count);

$sql=paginating_sql($per_page, $pagination);
?> 
    <h2>Photographs</h2>
    <p><?php echo $session->message;?></p>
<table class="bordered">
    <tr>
        <th>Image</th>
        <th>Filename</th>
        <th>Caption</th>
        <th>Size</th>
        <th>Type</th>
        
        <th>Comments</th>
        <th>&nbsp;</th>
    </tr>
    <?php $photos=  photograph::find_by_sql($sql);
           foreach($photos as $photo): ?>
    <tr>
    <td id="img">
        <img src="<?php 
    { 
        
        
        echo "../".$photo->image_path();
    }
    ?>" width="100" />
    </td>
    <td ><?php echo $photo->filename ?></td>
    <td><?php echo $photo->caption ?></td>
    <td><?php echo $photo->size(); ?></td>
    <td><?php echo $photo->type ?></td>
    <td><a href="comment.php?id=<?php echo $photo->id;?>"><?php echo count($photo->comments());?></a></td>
  
    <td><a href="delete_photo.php?id=<?php echo $photo->id?>" >Delete</a></td>
      </tr>
    <?php    endforeach;?>
</table>
     <div id="paginantion" style="clear: both">
<?php
prev_next($pagination,$page);
?>
</div>
    <p><a href="index.php">Back to index</a></p>
</HTML>
<?php include_layout_template("admin_footer.php");?>
    