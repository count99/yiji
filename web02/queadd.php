<?php require("DBhelper.php"); ?>
<script src="web02/home_files/jquery-1.9.1.min.js"></script>
<script>
function xx()
{
	var a=$(".question").last();
		a.after('<p>選項 <label for="question"></label><input type="text" name="question[]" id="question" class="question"></p>');
}
</script>
<?php
if(isset($_POST['question'])&&$_POST['que'])
{
	$question = $_POST['question'];
	//var_dump($question);
	$new = new DBhelper();
	foreach($question as $k=>$v)
	{
	//var_dump($v);
	$new->insert("que",["question"=>$_POST['que'],"answer"=>$v]);
	}
}
?>
<fieldset>
<legend> 新增問卷</legend>
<form action="" method="post">
  <p>問卷名稱     
    <label for="que"></label>
  <input type="text" name="que" id="que">
  </p>
  <p>選項 
    <label for="question"></label>
    <input type="text" name="question[]" id="question" class="question">
  </p>
  <button type="button" name="more" id="more" onClick="xx()">更多</button>  
  <p>
    <input type="submit" name="submit" id="submit" value="新增">&nbsp;|&nbsp;
    <input type="reset" name="reset" id="reset" value="清空">
  </p>
</form>
</fieldset>