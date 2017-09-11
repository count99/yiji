<?php require_once('Connections/db02.php'); ?>
<?php
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['name'])) {
  $loginUsername=$_POST['name'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "index.php?do=login";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db02, $db02);
  
  $LoginRS__query=sprintf("SELECT * FROM `user` WHERE name=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db02) or die(mysql_error());
  $user_result = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = $user_result['level'];
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
	
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	if($_SESSION['MM_UserGroup']==1){
		header("Location:admin.php?do=user");
	}
	else{
    header("Location: " . $MM_redirectLoginSuccess );
  }}
  else {
  //  header("Location: ". $MM_redirectLoginFailed );
  echo "<script>alert('查無帳號');</script>";
  }
}
?>
<form name="form1" method="POST" action="index.php?do=login" style="left:50%;">
  <p>會員登入</p>
  <p>帳號 
    <label for="name"></label>
    <input type="text" name="name" id="name">
  </p>
  <p>密碼
    <label for="password"></label>
    <input type="text" name="password" id="password">
  </p>
  <p>&nbsp;
    <input type="submit" name="submit" id="submit" value="登入">&nbsp;&nbsp;
    <input type="reset" name="reset" id="reset" value="清除">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="?do=forget">忘記密碼</a>&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;<a href="?do=sign">尚未註冊</a>
   </p>
   
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
