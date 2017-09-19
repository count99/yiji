<?php
if(isset($_GET['story']))
{
  $movie = new DBhelper();
  $movie_story = $movie->select('movies',['id'=>$_GET['story']]);
}
 switch ($movie_story[0]['level'])
			{
				case 1:
					$link = "level/03C01.png";
					$level="普通級";
					break;
				case 2:
					$link = "level/03C02.png";
					$level="輔導級";
					break;
				case 3:
					$link = "level/03C03.png";
					$level="保護級";
					break;
				case 4:
					$link = "level/03C04.png";
					$level="限制級";
					break;
			}	
?>
  
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="movie/03B20v.avi" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="img/<?php echo $movie_story[0]['post'];?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?php echo $movie_story[0]['name'];?>
          <input type="button" value="線上訂票" onclick="location.href='index.php?redo=orderonline'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="<?php echo $link;?>" style="display:inline-block;"><?php echo $level;?></p>
        <p style="margin:3px">影片片長 ： <?php echo $movie_story[0]['period'];?></p>
        <p style="margin:3px">上映日期 <?php echo $movie_story[0]['date'];?></p>
        <p style="margin:3px">發行商 ： <?php echo $movie_story[0]['publisher'];?></p>
        <p style="margin:3px">導演 ： <?php echo $movie_story[0]['director'];?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="location.href='index.php'"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>