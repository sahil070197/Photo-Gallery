
<?php
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
$message=null;
if(!$session->is_logged_in())
{
	redirect_to("index.php");
}
include_layout_template("admin_header.php");

if(isset($_GET['id']) && !empty($_GET['id']))
{
    

    $photo=  photograph::find_by_id($_GET['id']);
    if(!$photo)
    {
        $message="Photo for specified id not found";
        $session->message($message);
        redirect_to("index.php");
    }
    $comments=$photo->comments();
}else {
     $message="Some error with photo_id occured";
 }
?>
<p><?php echo output_message($session->message()); ?></p>
<?php foreach($comments as $records):?>
    <p><?php echo "(".datetime_to_text($records->created).")".$records->author.": ".htmlentities($records->body); ?>
        <br>
        <a href="delete_comment.php?photo=<?php echo $photo->id; ?>&comment_id=<?php echo $records->id;?>">Delete</a></p>
     <?php endforeach; ?>
<?php include_layout_template("admin_footer.php");?> 

