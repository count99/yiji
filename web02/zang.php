<?php
include("DBhelper.php");
$new = new DBhelper();
//var_dump($_SERVER);

if($_GET['do']=="zang")
{
	$new->insert("zang", ["post_id"=>$_GET['id'],"user_id"=>$_SESSION['MM_Username']]);
}
if($_GET['do']=="buzang")
{
	$new->delete("zang", ["post_id"=>$_GET['id'],"user_id"=>$_SESSION['MM_Username']]);
}
$new = NULL;
//header("Location:index.php?do=detail&id=".$_GET['id']);
echo "<script>history.go(-1);</script>";