<?php
$movies=new DBhelper();
$result = $movies->select('ord');
$stage = array("14"=>"14:00-16:00","16"=>"16:00-18:00","18"=>"18:00-20:00","20"=>"20:00-22:00","22"=>"22:00-24:00");
$get_movies = $movies->select('movies');
//var_dump($_POST,$_GET);
if(isset($_POST['delone'])){
	$movies->delete('ord',['id'=>$_POST['delone']]);
	echo "<script>location.href='admin.php?redo=adminorder';</script>";
}
if(isset($_POST['movie'])){
	$movies->delete('ord',['movie'=>$_POST['movie']]);
	echo "<script>location.href='admin.php?redo=adminorder';</script>";
}
if(isset($_POST['date'])){
	$movies->delete('ord',['date'=>$_POST['date']]);
	echo "<script>location.href='admin.php?redo=adminorder';</script>";
}
?>
<div class="rb tab">
  <h2 class="ct">訂單清單</h2>
  <form name="form1" method="post" action="">
    <table width="687" height="28" border="0">
      <tr>
        <td width="318">快速刪除：依日期
          <label for="date">
            <input type="text" name="date" id="date">
          </label></td>
        <td width="269">依電影
          <label for="movie"></label>
          <select name="movie" id="movie">
          	<?php foreach($get_movies as $k=>$v){?>
            <option value="<?=$v['name'];?>"><?=$v['name'];?></option>
            <?php }?>
        </select></td>
        <td width="86"><input type="submit" name="send" id="send" value="刪除"></td>
      </tr>
    </table>
  </form>
  <table width="664" border="1">
  <tr>
    <td width="104" align="center">訂單編號</td>
    <td width="94" align="center">電影名稱</td>
    <td width="54" align="center">日期</td>
    <td width="78" align="center">場次時間</td>
    <td width="86" align="center">訂購數量</td>
    <td width="104" align="center">訂購位置</td>
    <td width="62" align="center">操作</td>
  </tr>
  <form action="admin.php?redo=adminorder" name="single" method="post">
  <?php 
  //var_dump($result);
  if($result!="ZERO"){
  foreach($result as $k=>$v){?>
  <tr>
    <td align="center"><?=$v['sn'];?></td>
    <td align="center"><?=$v['movie'];?></td>
    <td align="center"><?=$v['date'];?></td>
    <td align="center"><?=$stage[$v['stage']];?></td>
    <?php $count_seat=array();
		for($i=1;$i<=4;$i++){
			if(!empty($v['seat'.$i])){
				$count_seat[]=$v['seat'.$i];}
		}?>
    <td align="center"><?=count($count_seat);?></td>
    <td align="center"><?php 
	foreach($count_seat as $i=>$j){
		echo floor($j/10)."排".($j%10)."號<br>";
	}?>
	</td>
    <td align="center"><button formmethod="post" name="delone" formaction="admin.php?redo=adminorder" value="<?=$v['id'];?>">刪除</button></td>
  </tr>
  <?php }}?>
  </form>
</table>

</div>