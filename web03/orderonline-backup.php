<script>
	   function aa(){
	   var a=$("#movie2").val();
	   this.location.href="index.php?redo=orderonline&name="+a;
	   }
	   
	   function bb(){
		   var a=$("#movie2").val();
		   var b=$("#date").val();
		   this.location.href="index.php?redo=orderonline&name="+a+"&date="+b;
	   }
</script>
<?php
//include('DBhelper.php');
$movie = new DBhelper();
$sql="SELECT * FROM movies WHERE TO_DAYS(now())-TO_DAYS(date)<=3";
$get_movies = $movie->conn->query($sql);
//var_dump($_POST,$_GET);
if(isset($_GET['name']))
{
	$name = $_GET['name'];
}

if(isset($_GET['date']))
{
	$theday=$_GET['date'];
}
//$data=$get_movies->fetch_assoc();
//var_dump($_GET,date('H'));


?>
<div style="position: absolute; left: 25%; width: 304px;">
<form name="order" action="index.php?redo=stage" method="post">
<table width="306" border="0">
  <tr>
    <td width="150" align="center">電影：</td>
    <td width="146" align="center"><label for="movie"></label>
       <label for="movie2"></label>
       <select name="movie" id="movie2" onChange="aa()">
       <?php while($data=$get_movies->fetch_assoc())
	   {?>
         <option value="<?= $data['name'];?>" <?php if($data['name']==@$name){echo 'selected';}?>><?= $data  ['name'];?></option>
         <?php }?>
       </select></td>
      <?php 
	  if(isset($name))
	  {
	  $the_movie = $movie->select('movies',['name'=>$name]);
	  $time_line=strtotime($the_movie[0]['date']);
	  $today =time();
	  $days = array();
	  
	  //var_dump($time_line, strtotime("+0day", $today));
	  
	  for($i=0;$i<3;$i++)
	  {
		  $test_time=strtotime("+".$i." day", $today);
		  $dead_time=strtotime("+3 days",$time_line);
		  //var_dump(strtotime("+".$i."day", $today));
		  
		  if($test_time<=$dead_time)
		  {
			  $get_day = date("Y-m-d",$test_time);
			  $days[]=$get_day;
		  }
		  else
		  {
			break;
		  }
	  }
	  // var_dump($stage);
       ?>
  </tr>
  <tr>
    <td align="center">日期：</td>
    <td align="center"><label for="date"></label>
      <select name="date" id="date" onchange="bb()">
     
      <?php
	  foreach($days as $k=>$v)
	  {
			  ?>
        <option value="<?=$v;?>" <?php if(@$theday==$v){echo 'selected';}?>><?=$v;
	  }}?></option>
      </select></td>
  </tr>
  <tr>
    <td align="center">場次：</td>
    <td align="center"><label for="stage"></label>
    <?php $stage = array("14"=>"14:00-16:00","16"=>"16:00-18:00","18"=>"18:00-20:00","20"=>"20:00-22:00","22"=>"22:00-24:00");
	if(count(@$days)==1)
	{?>
      <select name="stage" id="stage">
      <?php
	  foreach($stage as $k=>$v)
	  {
		  if($k>date("H")){?>
        <option value="<?=$k;?>"><?=$v;?></option>
        <?php }} ?>
		</select>
        <?php
	}
	else
 		{
			?>
                <select name="stage" id="stage">
                <?php
				if($days[0]==$theday){
				 var_dump($days[0],$theday);
				
                foreach($stage as $k=>$v)
                {
					if($k>date("H")){
                   ?>
                  <option value="<?=$k;?>"><?=$v;?></option>
    
          <?php }}}
		  else{
			  foreach($stage as $k=>$v)
	  {
		  ?>
        <option value="<?=$k;?>"><?=$v;?></option>
        <?php }}}
		  ?>
			 </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="確定">
      <input type="reset" name="reset" id="reset" value="重置"></td>
    </tr>
</table>

</form>
</div>