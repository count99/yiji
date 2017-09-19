<?php 
$time1=date('Ymd');
//var_dump($_SESSION);
if(isset($_POST['submit']))
{
	$_SESSION['chair']= $_POST['cs'];
	$ticket = new DBhelper();
	$result=$ticket->select("sn",['id'=>1]);
	//var_dump($result);
	if($time1==@$result[0]['date']){
		$ff = $result[0]['sn']+1;
		$ff = str_pad($ff, 4, 0, STR_PAD_LEFT);
		$sn = $time1.$ff;
		$_SESSION['sn']=$sn;
		$ticket->update('sn',['sn'=>$ff],['id'=>1]);
	}
	else{
		$_SESSION['sn']=$time1."0001";
		$ticket->update('sn',['sn'=>"0001", 'date'=>$time1],['id'=>1]);
	}
}
$stage = array("14"=>"14:00-16:00","16"=>"16:00-18:00","18"=>"18:00-20:00","20"=>"20:00-22:00","22"=>"22:00-24:00");

?>
<form id="form1" name="form1" method="post" action="index.php?redo=finishorder">
  <table width="493" border="0">
    <tr>
      <td colspan="2">感謝您的訂購，您的訂單編號是<?=$_SESSION['sn'];?></td>
    </tr>
    <tr>
      <td width="114">電影名稱：</td>
      <td width="369"><?=$_SESSION['movie_name'];?></td>
    </tr>
    <tr>
      <td>日期：</td>
      <td><?=$_SESSION['date'];?></td>
    </tr>
    <tr>
      <td>場次時間：</td>
      <td><?=$stage[$_SESSION['get_stage']];?></td>
    </tr>
    <tr>
      <td colspan="2"><p>座位：</p>
      <?php foreach($_SESSION['chair'] as $k=>$v){?>
      <p><?=floor($k/10);?>排<?=$k%10;}?>號</p>
      <p>共<?=count($_SESSION['chair']);?>張電影票</p></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="send" id="send" value="確認" /></td>
    </tr>
  </table>
</form>
<?php 
if(isset($_POST['send'])){
	$tmp=array();
	foreach($_SESSION['chair'] as $k=>$v){
		$tmp[]=$k;}
	for($i=1; $i<=count($_SESSION['chair']);$i++){
		$chair["seat".$i]=$tmp[$i-1];}
	$sql = array('sn'=>$_SESSION['sn'], 'movie'=>$_SESSION['movie_name'], 'date'=>$_SESSION['date'],'stage'=>$_SESSION['get_stage']);
	$sql = $sql+$chair;
	//var_dump($sql);
	$save_o = new DBhelper();
	$save_o->insert('ord',$sql);
	echo "<script>location.href='index.php';</script>";
}
?>
	
