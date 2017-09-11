<?php
include("DBhelper.php");
$new = new DBhelper();
$result = $new->page(5, "news");
if(isset($_GET['now'])){
	$now=$_GET['now'];}
else{
	$now=1;
}
?>
<fieldset>
<legend>目前位置：首頁&nbsp;&nbsp;>&nbsp;&nbsp;最新文章區</legend>
<table width="552" border="0">
  <tr>
    <td width="144" align="center">標題</td>
    <td width="398" align="center">內容</td>
  </tr>
  <?php
  foreach($result[$now] as $k=>$v){?>
  <tr>
    <td align="center"><?=$v['title'];?></td>
    <td align="center" height="52"><a href="?do=detail&id=<?=$v['id']?>"><?=substr($v['post'],0,200);?></a></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
</table>
</fieldset>