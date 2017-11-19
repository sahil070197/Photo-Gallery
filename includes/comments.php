<?php
require_once 'root_dir.php';
class Comment extends Database_Object
{
    public $id;
    public $photograph_id;
    public $created;
    public $author;
    public $body;
    protected static $table_name="comments";
    protected static $db_fields=array('id','photograph_id','created','author','body');
    
    public static function make_comment($photo_id,$author="Anonymous",$body=" ")
    {
        if(!empty($photo_id) && !empty($author)||!empty($body)){
        $comment=new Comment();
        $comment->photograph_id=(int)$photo_id;
        $comment->body=$body;
        $comment->author=$author;
        $comment->created=  strftime("%Y/%m/%d %H:%M:%S",time());
        return $comment;
    }
 else {
        
 {
     return false;
 }
    }
}

public static function find_comments($photo_id=0)
{
    global $database;
    $sql="Select * from ".self::$table_name." where photograph_id=".$database->escape_value($photo_id)." Order by created asc;";
    return self::find_by_sql($sql);
}
}
?>

