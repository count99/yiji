<?php
if(isset($_POST['del']))
{
	$test=new DBhelper();
	$result=$test->delete('movies',['id'=>$_POST['del']]);
	echo "<script>location.href='admin.php?redo=movie';</script>";
}

if(isset($_POST['up']))
{
	$test=new DBhelper();
	$result=$test->select('movies');
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
	$test->update('movies',$get_now, ['id'=>$get_now['id']]);
	$test->update('movies',$get_last, ['id'=>$get_last['id']]);
	echo "<script>location.href='admin.php?redo=movie';</script>";
}

if(isset($_POST['down']))
{
	$test=new DBhelper();
	$result=$test->select('movies');
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
	$test->update('movies',$get_now, ['id'=>$get_now['id']]);
	$test->update('movies',$get_last, ['id'=>$get_last['id']]);
	echo "<script>location.href='admin.php?redo=movie';</script>";
}