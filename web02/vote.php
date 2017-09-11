<?php include('DBhelper.php');
//var_dump($_GET);
if($_GET['id']){
$new = new DBhelper();
$result = $new->select("que", ['question'=>$_GET['id']]);

?>
<fieldset>
<legend>目前位置&nbsp;：&nbsp;首頁&nbsp; > &nbsp;問卷調查 ><?=$_GET['id'];?></legend>


<p>&nbsp;</p>
<form method="post" action="?do=voted">
<table width="200" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td colspan="2"><?=$_GET['id'];?></td>
  </tr>
  <?php foreach($result as $k=>$v){
	//var_dump($k,$v);
	?>
  <tr>
    <td colspan="2"><input type="radio" name="radio" id="answer" value="<?php echo $v['id'];?>">
    <?php echo $v['answer'];?>
      <label for="answer">
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $v['choice']?>">
      </label></td>
  </tr>
  <?php }}?>
  <tr>
    <td height="23" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="送出"></td>
  </tr>
</table>
</form>

<p>&nbsp;</p>
