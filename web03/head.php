<?php 
include('DBhelper.php');
session_start();
if(isset($_GET['do']))
{
	switch($_GET['do'])
	{
		case 'index':
			echo "<script>location.href='index.php'</script>";
			break;
		case 'admin':
			echo "<script>location.href='admin.php'</script>";
			break;
		default:
			echo "<script>location.href='index.php'</script>";
			break;
	}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>

<link rel="stylesheet" href="css/css.css">
<link href="s2.css" rel="stylesheet" type="text/css">

<script src="jquery-1.9.1.min.js"></script>
</head>
