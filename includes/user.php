<?php
include('root_dir.php');
require_once('initialize.php');

class User extends Database_Object{
	protected static $table_name="users";
	public $username;
	public $id;
	public $password;
	public $first_name;
	public $last_name;
        protected static $db_fields=array('id','username','password','first_name','last_name');
        public function full_name()
	{
		return $this->first_name." ".$this->last_name;
	}
	
	public static function authenticate($username="",$password="")
	{
		global $session;
		global $database;
		$username=$database->escape_value($username);
		$password=$database->escape_value($password);
		$query="Select id, first_name, last_name from users where username='{$username}' and password='{$password}' LIMIT 1;";
		$result=self::find_by_sql($query);
		
		if(empty($result))
		{
			return false;
		}
		else
		{
			return $result[0];
		}
	}
	
      
            
            
	
}

?>