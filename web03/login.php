<?php
$admin=array('name'=>'admin','ps'=>'1234');
if(isset($_POST['name'])&&isset($_POST['pw']))
{
	if(($_POST['name']==$admin['name'])&&($_POST['pw']==$admin['ps']))
	{
		$_SESSION['name']='admin';
		echo "<script>
		alert('登入成功');
		location.href='admin.php';
		</script>";
	}
	else
	{
		echo "<script>
		alert('登入失敗');
		location.href='admin.php?redo=login';
		</script>";
	}
}
?>


<form name="form1" method="post" action="">
  <p>
    <label for="name"></label>
  帳號；
  <label for="name2"></label>
  <input type="text" name="name" id="name2">
  </p>
  <p>密碼：
    <label for="pw"></label>
    <input type="text" name="pw" id="pw">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="登入">
  </p>
</form>
