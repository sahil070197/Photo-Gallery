<?php
include('../includes/root_dir.php');
require_once (LIB_PATH.DS."initialize.php");
$user=User::find_by_id(3);

$users=User::find_all();

include_layout_template("header.php");
?>
<?php
echo $user->first_name."<br/>";
echo $user->full_name()."<br/>";
foreach($users as $user)
	{
		echo $user->full_name()."<br/>";
	}
?>
		<?php include_layout_template("footer.php"); ?>