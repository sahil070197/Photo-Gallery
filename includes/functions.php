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
function create_log($file_name,$action)
{

	if($handle=fopen(SITE_ROOT.DS."logs/{$file_name}", 'a'))
	{
		fwrite($handle,"".strftime("%d/%m/%Y %H:%M:%S",time())." | {$action}: ".$_SESSION['full_name']."\n");
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
function datetime_to_text($date_time="")
{
    $unixdatetime=  strtotime($date_time);
    return strftime("%b %d,%Y at %I:%M: %p",$unixdatetime);
    
}
function prev_next($pagination,$page)
{
    if($pagination->has_previous_page())
{
    echo "<a href=\"display_photos.php?page=".$pagination->previous_page()."\"> &laquo; Previous </a> ";
}
for($i=1;$i<=$pagination->total_page();$i++)
{
    if($i==$page)
    {
        echo "&nbsp;<span class=\"selected\" >".$i."</span>";
    }
    else 
    echo "&nbsp;<a href=\"display_photos.php?page=".$i."\">".$i."</a>";
}
    
if($pagination->has_next_page() && $pagination->total_page()>1)
{
    echo "&nbsp;<a href=\"display_photos.php?page=".$pagination->next_page()."\"> Next &raquo; </a> ";
}

}
function prev_next_user($pagination,$page)
{
    if($pagination->has_previous_page())
{
    echo "<a href=\"index.php?page=".$pagination->previous_page()."\"> &laquo; Previous </a> ";
}
for($i=1;$i<=$pagination->total_page();$i++)
{
    if($i==$page)
    {
        echo "&nbsp;<span class=\"selected\" >".$i."</span>";
    }
    else 
    echo "&nbsp;<a href=\"index.php?page=".$i."\">".$i."</a>";
}
    
if($pagination->has_next_page() && $pagination->total_page()>1)
{
    echo "&nbsp;<a href=\"index.php?page=".$pagination->next_page()."\"> Next &raquo; </a> ";
}

}
function paginating_sql($per_page,$pagination)
{
    return "Select * from photographs LIMIT {$per_page} OFFSET ".$pagination->offset();       
}
?>