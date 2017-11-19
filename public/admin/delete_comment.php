<?php
include('../../includes/root_dir.php');
require_once(LIB_PATH.DS.'initialize.php');
$message=null;
if(!$session->is_logged_in())
{
	redirect_to("index.php");
}
if(isset($_GET['comment_id']))
{
    $comment= new Comment();
    $comment->id=$_GET['comment_id'];
    {
        if($comment->delete())
        {
            $session->message("Deletion Succesful");
            redirect_to("comment.php?id=".$_GET['photo']);
        }
        else
        {
           $session->message("deletion failed");
            redirect_to("comment.php?id=".$_GET['photo']);
        }
}}
 else {
            $session->message("INVALID comment!");
            redirect_to("comment.php?id=".$_GET['photo']);
 }


