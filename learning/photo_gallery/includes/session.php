<?php
//Object should not be put in se 
class Session{
	public $user_id;
	private $logged_in=false;
	function __construct(){
		session_start();
		$this->check_logged_in();
	}
	public function is_logged_in(){
		return $this->logged_in;
	}
	private function check_logged_in(){

		if(isset($_SESSION['user_id']))
		{
			$this->user_id=$_SESSION['user_id'];
			$this->logged_in=true;
		}
		else
		{
			unset($this->user_id);
			$this->logged_in=false;
		}
	}
	public function login($user){		
		if($user)
		{
			$_SESSION['user_id']=$user->id;
			$_SESSION['full_name']=$user->full_name();
			$this->user_id=$user->id;
			create_log("login_logout_logs.php","LOGIN ",$user->full_name());
		}
	}
	public function logout(){
		create_log("login_logout_logs.php","LOGOUT",$_SESSION['full_name']);
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in=false;
		unset($_SESSION['full_name']);
	}
}
$session=new Session();
?>