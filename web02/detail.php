<?php
include("DBhelper.php");
$new = new DBhelper();

if(isset($_GET['id']))
{
  $id = $_GET['id'];	
  $new_result=$new->select("news",["id"=>$_GET['id']]);
	if(isset($_SESSION['MM_Username']))
	{
		$zang_result=$new->select("zang",["post_id"=>$_GET['id'],"user_id"=>$_SESSION['MM_Username']]);	
	}
}
//var_dump($new_result,$zang_result, $id);
echo "<fieldset><legend>".$new_result[0]['title']." | ";
if(isset($_SESSION['MM_Username']))
{	
	if($zang_result!="0 result")
	{
		//var_dump($zang_result, $id);
		echo "<a href='index.php?do=buzang&id=".$zang_result[0]['post_id']."'/>收回讚</a>";
	}
	else
	{
		//var_dump($zang_result, $id);
		echo "<a href='index.php?do=zang&id=".$id."'/>讚</a>";
	}
}

echo "</legend>";
echo "<p>".$new_result[0]['post']."</p>";