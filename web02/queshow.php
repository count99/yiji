<?php include('DBhelper.php');
//var_dump($_GET);
if($_GET['id']){
$new = new DBhelper();
$result = $new->select("que", ['question'=>$_GET['id']]);
$get_count = new DBhelper();
$sql = "SELECT sum(choice) as count FROM que WHERE question='".$_GET['id']."'";
$count_result = $get_count->conn->query($sql);
$count = $count_result->fetch_assoc();
?>
<fieldset>
<legend>目前位置&nbsp;：&nbsp;首頁&nbsp; > &nbsp;問卷調查 ><?=$_GET['id'];?></legend>


<p>&nbsp;</p>
<table width="573" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><?=$_GET['id'];?></td>
  </tr>
  <?php foreach($result as $k=>$v){
	//var_dump($k,$v);
	?>
  <tr>
    <td width="175"><?php echo ($k+1).$v['answer'];
	$amount = round($v['choice']/$count['count'],2)*100 ;
	?></td>
    <td width="219"><?php $long = ceil($amount/10);
		//var_dump($long);
		echo "<div style='width:".$long."em; height:1em; background-color:red;'></div>"?> 
        </td>
    <td width="179">
    <div style="display:inline-block">
    <?php
	echo "<div>".$v['choice']."票(".$amount."%)</div>";
	?>
    </div>
    </td>
  </tr>
  <?php }}?>
  <tr>
    <td colspan="3"><button onClick="history.go(-1)">返回</button></td>
  </tr>
</table>
<span style='background-color:red; margin-right:5px;'></span>


