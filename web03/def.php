<?php
$show = new DBhelper();
$result = $show->select('pre', ['view'=>1]);
$pre_page = array();
foreach($result as $k=>$v)
{
	$pre_page[floor($k/4)+1][]=$v;
}
if(empty($_GET['movie_page']))
{
	$mov_inx = 1;
}
else
{
	$mov_inx = $_GET['movie_page'];
}
if(empty($_GET['page']))
{
	$now = 1;
}
else
{
	$now = $_GET['page'];
}

$oo=new DBhelper();
$wow = $oo->select('effect',['id'=>1]);

switch ($wow[0]['effect'])
{
	case 1:
		$att1 = "fadeOut";
		$att2 = "fadeIn";
		break;
	case 2:
		$att1 = "hide";
		$att2 = "show";
		break;
	case 3:
		$att1 = "slideUp";
		$att2 = "slideDown";
		break;
	default:
		$att1 = "hide";
		$att2 = "show";
		break;
}

$sql = "SELECT * FROM movies WHERE TO_DAYS(now())-TO_DAYS(date)<3;";
$movies = $show->conn->query($sql);
if($movies->num_rows>0)
{
	$tmp=array();
	while($data=$movies->fetch_assoc())
	{
		$tmp[]=$data;
	}
	
	$movie_page = array();
	foreach($movies as $k=>$v)
	{
		$movie_page[floor($k/4)+1][]=$v;
	}
	//var_dump($movie_page);
}									
?>
<div id="mm">
    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
            <li><img id="pre" src="" width="100px"/></li>
          </ul>
          <ul class="controls">
          <script>
                    	var lin=new Array();
						var ind;
						var im=0; 
					
						function show(ind)
						{
							$("#pre").slideUp(1000, function(){
								$(this).attr("src", lin[ind]);
								});
							$("#pre").slideDown(1000);
						}
				
						function ww()
						{
							$("#pre").<?php echo $att1;?>(1000, function(){
								im++;
								if(im>lin.length-1){
							im=0;}
								$(this).attr("src", lin[im]);
								});
							$("#pre").<?php echo $att2;?>(1000);
							
						}
           </script>
             <?php
			 if(count($pre_page)>1 && $now>1)
			 { echo
            '<a href="index.php?page='.($now-1).'"><img src="01E02.jpg" width="20" height="20" /></a>';}
			for($i=0;$i<count($pre_page[$now]);$i++)
			{
				echo '<a id="'.$i.'" href="#" onclick="show('.$i.')">按鈕</a>';
			?>
			<script>
			lin[<?php echo $i;?>]="img/"+"<?php echo $pre_page[$now][$i]['pre'];?>";
			$("#pre").attr("src", lin[0]);
			$(document).ready(function(e) {
				if(lin.length>1)
				{
                	setInterval("ww()",3000);
				}
            });
			</script>
            <?php	
			}
			 if(count($pre_page)>1 && $now<count($pre_page))
			 { echo
            '<a href="index.php?page='.($now+1).'"><img src="01E01.jpg" width="20" height="20" /></a>';}
			?>
          </ul>
        </div>
      </div>
    </div>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
      <?php 
	  	//var_dump($mov_inx);
	  	foreach($movie_page[$mov_inx] as $k=>$v)
	  {
		 // var_dump($v);
		 
		   switch ($v['level'])
			{
				case 1:
					$link = "level/03C01.png";
					break;
				case 2:
					$link = "level/03C02.png";
					break;
				case 3:
					$link = "level/03C03.png";
					break;
				case 4:
					$link = "level/03C04.png";
					break;
			}
		
		  ?>
        <div class="movie_list" style="float: left;; width:45%; height:35%;">
        <table width="103%" height="30%" border="0" style="border:4px #FFD382 groove;">
            <tr>
              <td colspan="2" align="center">片名：<?php echo $v['name'];?></td>
            </tr>
            <tr>
              <td width="30%"><img src="img/<?php echo $v['post'];?>" width="80%"/></td>
              <td width="30%"><p>分級：<img src="<?php echo $link;?>" width="30%"></p>
              <p>上映日期：<?php echo $v['date'];?></p></td>
            </tr>
            <tr>
              <td><button name="story"onclick="location.href='index.php?redo=show&story=<?php echo $v['id'];?>'">劇情簡介</button></td>
              <td><button name="order" formmethod="get" onclick="location.href='index.php?redo=orderonline'">線上訂票</button></td>
            </tr>
          </table>
		</div>
        <?php }?>
        <div class="ct" style=""> 
        <?php foreach($movie_page as $k=>$v)
		{?>
      <a href="index.php?movie_page=<?php echo $k;?>" <?php if($k==$mov_inx){echo "style='font-size: 22px; color: red;'";}?>><?php echo $k;}?></a>
      		</div>
      </div>
    </div>