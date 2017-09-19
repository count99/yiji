<?php
//var_dump($_POST);
if(isset($_POST['up']))
{
	$test=new DBhelper();
	$result=$test->select('pre');
	$now = $_POST['up'];
	for($i=0;$i<count($result);$i++)
	{
		if($now==$result[$i]['id'])
		{
			$get_now = $result[$i];
			$get_now['id']=$result[$i-1]['id'];
			$get_last = $result[$i-1];
			$get_last['id']=$result[$i]['id'];
			break;
		}
	}
	$test->update('pre',$get_now, ['id'=>$get_now['id']]);
	$test->update('pre',$get_last, ['id'=>$get_last['id']]);
	echo "<script>location.href='admin.php?redo=pre';</script>";
}

if(isset($_POST['down']))
{
	$test=new DBhelper();
	$result=$test->select('pre');
	$now = $_POST['down'];
	for($i=0;$i<count($result);$i++)
	{
		if($now==$result[$i]['id'])
		{
			$get_now = $result[$i];
			$get_now['id']=$result[$i+1]['id'];
			$get_last = $result[$i+1];
			$get_last['id']=$result[$i]['id'];
			break;
		}
	}
	$test->update('pre',$get_now, ['id'=>$get_now['id']]);
	$test->update('pre',$get_last, ['id'=>$get_last['id']]);
	echo "<script>location.href='admin.php?redo=pre';</script>";
}