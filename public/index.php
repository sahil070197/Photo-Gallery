
<?php
include('../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');

include_layout_template("header.php");


$page=!empty($_GET['page'])?(int)$_GET['page'] :1;
$per_page=2;
$total_count=photograph::count_all();
$pagination=new Paginantion($page,$per_page,$total_count);
$sql=  paginating_sql($per_page, $pagination);
if($page>$pagination->total_page())
{
    redirect_to("index.php");
}
$message=null;

?> 
    <h2>Photographs</h2>
    <p><?php echo $session->message; ?></p>
<?php 
    $photos=  photograph::find_by_sql($sql);
    foreach($photos as $photo):
?>
<div style="float: left; margin-left: 20px;">
    <a href="public_photo_display.php?id=<?php
    echo $photo->id
    ?>">
    <img id="public_img" src="<?php 
    {
        echo $photo->image_path();
    }
    ?>"/>
    </a>
    
<p><?php echo $photo->caption; ?></p>
</div>
 <?php    endforeach;?>
    <div id="paginantion" style="clear: both">
        <?php prev_next_user($pagination, $page) ?>
    </div>
</HTML>
<?php include_layout_template("footer.php");?>
    