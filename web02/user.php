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

if ((isset($_POST['del'])) && ($_POST['del'] != "")) {
 foreach($_POST['del'] as $k=>$v){
  $deleteSQL = sprintf("DELETE FROM `user` WHERE name=%s",
                       GetSQLValueString($k, "text"));

  mysql_select_db($database_db02, $db02);
  $Result1 = mysql_query($deleteSQL, $db02) or die(mysql_error());}
}

mysql_select_db($database_db02, $db02);
$query_Recordset1 = "SELECT * FROM `user`";
$Recordset1 = mysql_query($query_Recordset1, $db02) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<script type="text/javascript" src="web02/home_files/jquery-1.9.1.min.js"></script>
<form name="form1" method="post" action="">
  <table width="392" border="0">
    <tr>
      <td width="143" align="center">編號</td>
      <td width="143" align="center">密碼</td>
      <td width="92" align="center">刪除</td>
    </tr>
    <?php
	do { ?>
  <tr>
    <td align="center"><?php echo $row_Recordset1['name']; ?></td>
    <td align="center"><?php echo $row_Recordset1['password']; ?></td>
    <td align="center">
      <input type="checkbox" name="del[<?php echo $row_Recordset1['name'];?>]" id="del">
      <label for="del"></label></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <tr>
      <td colspan="3" align="center"><input type="submit" name="submit" id="submit" value="確定刪除">&nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="重新選取"></td>
    </tr>
  </table>
</form>

<?php
include('sign.php');
?>
