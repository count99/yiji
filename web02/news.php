<?php include('DBhelper.php');
$new = new DBhelper();
$result = $new->page(3,'news');

if(!empty($_GET['now'])){
    $now = $_GET['now'];}
else{$now = 1;}

if(isset($_POST['del'])){
	foreach($_POST['del'] as $key=>$value){
 		$new->delete("news",["id"=>$key]);}
}

if(isset($_POST['hid']))
{
  if(isset($_POST['view']))
  {
    $_POST['view']=$_POST['view']+$_POST['hid'];
  }
  else
  {
    $_POST['view']=$_POST['hid'];
  }
	foreach($_POST['view'] as $i=>$j)
	  {
	  $new->update("news", ["view"=>$j], ['id'=>$i]);
	  }
	header('Location:admin.php?do=news&now='.$now);	
} 
  
?>
<form name="form1" method="post" action="admin.php?do=news&now=<?php echo $now;?>">
  <table width="394" border="0" style="">
    <tr>
      <td width="95" align="center">編號</td>
      <td width="79" align="center">標題</td>
      <td width="78" align="center">顯示</td>
      <td width="124" align="center">刪除</td>
    </tr>
    <tr>
  <?php
foreach($result[$now] as $k=>$v){  	
		?> 
      <td align="center"><?php echo $v['id'];?></td>
      <td align="center"><?php echo $v['title'];?></td>
      <td align="center"><input type="hidden" name="hid[<?php echo $v['id'];?>]" id="hiddenField" value="0"/>
        <input name="view[<?php echo $v['id'];?>]" type="checkbox" id="view" value="1" <?php if($v['view']==1){echo "checked='checked'";}?>>
      <label for="view"></label></td>
      <td align="center"><input name="del[<?php echo $v['id'];?>]" type="checkbox" id="del" value="1" >
      <label for="del"></label></td>
    </tr>
    <?php }?>
    <tr>
      <td colspan="4" align="center">
      			<?php
				  if($now!=1){echo "<a href='?do=news&now=".($now-1)."'> < </a>";}
      				 foreach ($result as $i=>$j){
						if($i==$now){echo "<strong>".$i."</strong>&nbsp;&nbsp;";}
						else{echo $i;}}
          if($now!=count($result)){echo "<a href='?do=news&now=".($now+1)."'> > </a>";}
          ?>
	  </td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="submit" id="submit" value="確定修改">
</td>
    </tr>
  </table>
</form>
