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

$colname_Recordset1 = "-1";
if (isset($_POST['name'])) {
  $colname_Recordset1 = $_POST['name'];
}
mysql_select_db($database_db02, $db02);
$query_Recordset1 = sprintf("SELECT * FROM `user` WHERE name = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $db02) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")&&$totalRows_Recordset1<1) {
	
  $insertSQL = sprintf("INSERT INTO `user` (name, password, email) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_db02, $db02);
  $Result1 = mysql_query($insertSQL, $db02) or die(mysql_error());
}
?>
<script src="web02/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="web02/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

<form name="form2" action="<?php echo $editFormAction; ?>" method="POST">
<table width="400" border="0">
  <tr>
    <th colspan="2" align="left">新增會員</th>
    </tr>
  <tr>
    <td colspan="2">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
    </tr>
  <tr>
    <td width="197">Step1:登入帳號</td>
    <td width="143"><label for="name"></label>
      <span id="sprytextfield1">
      <input type="text" name="name" id="name" class="test">
      <span class="textfieldRequiredMsg">需要有一個值。</span></span>
      <?php if($totalRows_Recordset1>0){echo "<script>alert('帳號重複');</script>";}?><div id="err"></div></td>
  </tr>
  <tr>
    <td>Step2:登入密碼</td>
    <td><label for="password"></label>
      <span id="sprytextfield2">
      <input type="text" name="password" id="password" class="test">
      <span class="textfieldRequiredMsg">需要有一個值。</span></span></td>
  </tr>
  <tr>
    <td>Step3:再次確認密碼</td>
    <td><label for="again"></label>
      <span id="sprytextfield3">
      <input type="text" name="again" id="again" class="test">
      <span class="textfieldRequiredMsg">需要有一個值。</span></span></td>
  </tr>
  <tr>
    <td>Step4:信箱(忘記密碼時使用)</td>
    <td><label for="email"></label>
      <span id="sprytextfield4">
      <input type="text" name="email" id="email" class="test">
      <span class="textfieldRequiredMsg">需要有一個值。</span></span></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" id="submit2" value="新增">&nbsp;&nbsp;
      <input type="reset" name="reset" id="reset" value="清除"></td>
    </tr>
</table>
<input type="hidden" name="MM_insert" value="form2">

</form>


<?php
mysql_free_result($Recordset1);
?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
