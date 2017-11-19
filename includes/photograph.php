<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
        require_once("initialize.php");
        require_once ("root_dir.php");
        class photograph extends Database_Object
        {
            protected static $table_name="photographs";
            protected static $db_fields=array("id","filename","type","size","caption");
            public $id;
            public $filename;
            public $type;
            public $size;
            public $caption;
            public $error=array();
            private $temp_path;
            protected $upload_dir="images";
            protected $upload_error=array(
                '0'=>'No errors.',
                '1'=>'Larger than maximum upload php limit.',
                '2'=>'Larger than form upload limit.',
                '3'=>'Partial Upload',
                '4'=>'No files',
                '6'=>'No Temporary Directory.',
                '7'=>'Can\'t Write to disc',
                '8'=>'File stopped by extention');
            
            
            public function attach_file($file)
            {
                if(!$file||!is_array($file)||empty($file))
                {
                    $this->error[]="no files uploaded";                    
                }
                else if($file['error']!=0)
                {
                    $this->error=  $this->upload_error[$file['error']];                    
                }
                else
                {
                    $this->temp_path=$file['tmp_name'];
                    $this->size=$file['size'];
                    $this->filename=  basename($file['name']);
                    $this->type=$file['type'];
              }
            }
            public function save() {
                global $database;
                if(isset($this->id))
                {
                    $this->update();
                }
                else {
                    if(empty($this->error) || !strlen($this->caption)>250 )
                    {
                        $target_path=SITE_ROOT.DS."public".DS.$this->upload_dir.DS.$this->filename;
                        if(file_exists($target_path))
                        {
                            $this->error[]="File already Existing";
                            return false;
                        }
                            
                        if(move_uploaded_file($this->temp_path,  $target_path))
                        {
                            if($this->create())
                            {
                                //file not there anymore, moved already
                                unset($this->temp_path);
                                $this->id=$database->insert_id();
                                return true;
                            }
                            else{
                                $this->error[]="Error in creating databse record";
                            }    
                        }
                        else {
                            $this->error[]="Error in moving to destianation";
                            return FALSE;
                        }
                    }
                        
                }
                    
            }
            
            public function image_path()
            {
                return $this->upload_dir.DS.$this->filename;
            }
            
            public function size()
            {
                if($this->size<1024)
                {
                    return "{$this->size} bytes";
                }
                else if($this->size<1048576)
                {
                    return round(($this->size)/1024,2,PHP_ROUND_HALF_UP)." KB";
                }
                 else
                {
                    return round(($this->size)/1045876,2,PHP_ROUND_HALF_UP)." MB";
                }
                    
            }
            public function delete() {
                parent::delete();
                
                unlink("../".$this->upload_dir.DS.$this->filename);
                create_log("login_logout_logs.php", "Deleted Photo-ID: ".$this->id);
            }
           public function comments()
           {
               return Comment::find_comments($this->id);
           }
        }
?>
