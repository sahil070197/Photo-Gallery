<?php
require_once '../includes/root_dir.php';
require '../includes/initialize.php';
$message="";
$photo=new photograph();
if(isset($_GET['id']))
{
    $photo=  photograph::find_by_id($_GET['id']);
    if(!$photo)
    {
        $message="Photo for specified id not found";
        $session->message($message);
        redirect_to("index.php");
    }
    if(isset($_POST['submit']))
    {
        $author=trim($_POST['author']);
        $body=trim($_POST['body']);
        $comment=Comment::make_comment($photo->id,$author,$body);
        if($comment && $comment->save())
        {
            redirect_to("public_photo_display.php?id=".$photo->id);
           
        }
 else {
     $message="Some error occured";
 }
        
    }
 else {
    $author="";
    $body="";
    }
include_layout_template("header.php");
}
else
{
    $message="Photo ID unspecified";
}
?>

<div style="float: left; margin-left: 20px;" id='photo'>
    <img src="<?php echo $photo->image_path()?>"/>
</div>
<div id='content' style="float: left; margin-left: 20px; width: 400px; height: 300px; color: brown; padding-top: 150px; font-family: cursive; font-size: 40px; margin-left: 20px; vertical-align: middle; float: left; ">
    
    <br><br><br>
       <?php echo $photo->caption; ?>
</div>
<div style="float: left; margin-top:20px; text-align: left; width: 800px; height: 400px; padding: 10px; margin-top: 20px; ">

    <?php    output_message($message);?>
    <?php $co_ob=$photo->comments(); 
 foreach ($co_ob as $records): ?>
    <p><?php echo "(".datetime_to_text($records->created).")".$records->author.": ".htmlentities($records->body); ?></p>
     <?php endforeach; ?>
    
    <h3>New Comment</h3>
  <?php echo output_message($message); ?>
    <form action="public_photo_display.php?id=<?php echo $photo->id; ?>" method="post">
    <table>
      <tr>
        <td>Your name:</td>
        <td><input type="text" name="author" value="<?php echo $author?>" /></td>
      </tr>
      <tr>
        <td>Your comment:</td>
        <td><textarea name="body" cols="40" rows="8"><?php echo $body?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" value="Submit Comment" /></td>
      </tr>
    </table>
  </form>
</div>
 

<?php include_layout_template("footer.php");?>
    