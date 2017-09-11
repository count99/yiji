<?php require_once('Connections/db02.php'); ?>
<?php
if(!isset($_SESSION['user'])){
session_start();
} 

	
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_db02, $db02);
$query_visiters = "SELECT * FROM visiters WHERE id = 1";
$visiters = mysql_query($query_visiters, $db02) or die(mysql_error());
$row_visiters = mysql_fetch_assoc($visiters);
$totalRows_visiters = mysql_num_rows($visiters);
$today = date("Y-m-d");

if($today != $row_visiters['day']){
	$sql_1 = "UPDATE visiters SET today=0, day='".$today."' WHERE id=1";
	mysql_select_db($database_db02, $db02);
	$result_1 = mysql_query($sql_1, $db02) or die(mysql_error());
	mysql_free_result($visiters);
}

if(!isset($_SESSION['visit_today'])){
	$_SESSION['visit_today'] = $row_visiters['today']+1;
	$_SESSION['visit_total'] = $row_visiters['total']+1;
	$sql_2 = "UPDATE visiters SET today=".$_SESSION['visit_today'].", total=".		$_SESSION['visit_total']." WHERE id=1";
	mysql_select_db($database_db02, $db02);
	$result_2 = mysql_query($sql_2, $db02) or die(mysql_error());
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>健康促進網</title>
<link href="home_files/css.css" rel="stylesheet" type="text/css">
<script src="home_files/jquery-1.9.1.min.js"></script>
<script src="home_files/js.js"></script>
<!--<script src="file:///C|/Users/eli/AppData/Roaming/Adobe/Dreamweaver CS6/zh_TW/Configuration/Temp/Assets/eam77ED.tmp/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="file:///C|/Users/eli/AppData/Roaming/Adobe/Dreamweaver CS6/zh_TW/Configuration/Temp/Assets/eam77ED.tmp/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
--></head>

