<?php
include('root_dir.php');
include ('initialize.php');
function strip_zeroes_from_date($marked_string="")
{
	$no_zeroes=str_replace("*0", "", $marked_string);
	$cleaned_string=str_replace("*", "", $no_zeroes);
	return $cleaned_string;
}
function redirect_to($destination=NULL)
{
	if($destination!=NULL)
	{
		header("Location: {$destination}" );
		exit;
	}
}
function create_log($file_name,$action,$user)
{

	if($handle=fopen(SITE_ROOT.DS."logs/{$file_name}", 'a'))
	{
		fwrite($handle,"".strftime("%d/%m/%Y %H:%M:%S",time())." | {$action}: ".$user."\n");
		fclose($handle); 
	}
}
function output_message($message="")
{
	if(!empty($message))
	{
		return "<p class=\"message\">{$message}</p>";
	}
	else
	{
		return "";
	}
}
function __autoload($class_name)
{
	$class_name=strtolower($class_name);
	$path=LIB_PATH.DS."{$class_name}.php";
	if(file_exists($path))
	{
		require_once($path);
	}
	else
	{
		die("The file {$class_name}.php could not be found");
	}
}
function include_layout_template($template="")
{
	include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);

}
?>