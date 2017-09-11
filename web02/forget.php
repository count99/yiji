<form id="form1" name="form1" method="post" action="?do=forget">
  <p>
    <label for="email"></label>
  請輸入信箱以查詢密碼</p>
  <p>
    <label for="email2"></label>
    <input type="text" name="email" id="email2" />
  </p>

  <input name="submit" type="submit" value="尋找"/>
</form>

<?php
include("DBhelper.php");
$new = new DBhelper(); 
$result = $new->select("user", ["email"=>$_POST['email']]);
if(isset($_POST['email'])){
//	var_dump($_POST,$result);
  if(!empty($result[0]['email'])){
//	  var_dump($_POST,$result);
	  echo "<p>您的密碼為".$result[0]['password']."</p>";}
  else{
	  echo "查無此資料";
  }
}
?>  
  
