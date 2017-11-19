<?php
include('root_dir.php');
require_once("initialize.php");
class MySQLDATABASE
{
	private $connection;
	public $last_query;
	private $new_enough_php;
	private $magic_quotes_enabled;
	function __construct()
	{
		$this->new_enough_php=function_exists("mysqli_real_escape_string");
		$this->magic_quotes_enabled=get_magic_quotes_gpc();
		
		$this->open_connection();
	}
	public function open_connection()
	{
		
		$this->connection=mysqli_connect( SERVER,USERNAME,PASSWORD);
		if(!($this->connection))
		{
			echo mysqli_error();
		}
		else
		{
			$db_select=mysqli_select_db($this->connection,DATABASE);
			if(!$db_select)
			{
				die("Databse selection failed: ");
			}
		}
	}
	public function query($sql)
	{

		$this->last_query=$sql;
		$result=mysqli_query($this->connection,$sql);
		if(!$result)
		{
			die("Query failed: <br/>"."Last query : ".$this->last_query."<br/> ".mysqli_error($this->connection));
		}
		return $result;
	}
	public function escape_value($value)
	{
		
		if($this->new_enough_php)
		{
			if($this->magic_quotes_enabled)
			{
				$value=stripslashes($value);
			}
			$value=mysqli_real_escape_string($this->connection,$value);
		}
		else
		{
			if(!($this->magic_quotes_enabled))
			{
				$value=addslashes($value);
			}
		}
		return $value;
	}
	public function close_connection()
	{
		
		if(isset($this->connection))
		{
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}
	public function fetch_array($result)
	{
		
		return mysqli_fetch_assoc($result);
	}
	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}
	public function insert_id()
	{
		return mysqli_insert_id($this->connection);
	}
	public function affected_rows()
	{
		return mysqli_affected_rows($this->connection);
	}
}

$database=new MySQLDATABASE();
?>
