<?php
class Session{
	public $user_id;
	private $logged_in=false;
        public $message=null;
	function __construct(){
		session_start();
		$this->check_logged_in();
                $this->check_message();
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
			create_log("login_logout_logs.php","LOGIN ");
		}
	}
	public function logout(){
		create_log("login_logout_logs.php","LOGOUT");
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in=false;
		unset($_SESSION['full_name']);
	}
        private function check_message()
        {
            if(isset($_SESSION['message']))
            {
                $this->message=$_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
        public function message($msg="")
        {
            if(!empty($msg))
            {
                $_SESSION['message']=$msg;
            }
            else
            {
                return $this->message;
                
            }
        }
}
$session=new Session();
?>