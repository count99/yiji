<script>
$(document).ready(function(e) {
	$('.choice').click(function(){
		if($('.choice:checked').length>4){
			return false;}
		});
});
$(document).on('click',function(){$('#ticket').text($('.choice:checked').length);});
</script>
<?php
//var_dump($_POST);
$stage = array("14"=>"14:00-16:00","16"=>"16:00-18:00","18"=>"18:00-20:00","20"=>"20:00-22:00","22"=>"22:00-24:00");
if(isset($_POST['movie'])){
	$_SESSION['movie_name']=$_POST['movie'];
	$_SESSION['date']=$_POST['date'];
	$_SESSION['get_stage']=$_POST['stage'];
}
?>
<div>&nbsp;</div>
<form action="index.php?redo=finishorder" method="post">
<table width="600" border="1" cellpadding="1" cellspacing="0">
<?php for($j=1;$j<=4;$j++){?>
  <tr>
  <?php for($i=1;$i<=5;$i++){?>
    <td class="stage" id="<?=$j.$i;?>"><?php echo $j."排-".$i."號";?>
    <br />
    <input name="cs[<?=$j.$i;?>]" class="choice" id="<?="c".$j.$i;?>" type="checkbox" value="1" /></td>
    <?php }?>
  </tr>
  <?php }?>
</table>
<input name="movie" type="hidden" value="<?=$movie;?>" />
<input name="date" type="hidden" value="<?=$date;?>" />
<input name="get_stage" type="hidden" value="<?=$get_stage;?>" />
<div>
您選擇的電影是：<?=$_SESSION['movie_name'];?>
</div>
<div>
您選擇的時刻是：<?=$_SESSION['date']."   ".$stage[$_SESSION['get_stage']];?>
</div>
<div>
您已經勾選了<span id="ticket" style="font-size:24px;color:red;">?</span>張票，最多可以購買四張票。
</div>
<input name="" type="button" onclick="history.go(0);" value="回上一步"/>&nbsp;<input name="submit" type="submit" id="ready" value="完成訂購"/>
</form> 
