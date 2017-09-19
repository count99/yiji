<?php
$data = new DBhelper();
$sql = "SELECT * FROM movies ORDER BY id ASC";
$result = $data->conn->query($sql);
//var_dump($data);
?>
<div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
      <div>
      
      <form method="post">
      <button name="add" id="add" formmethod="post" formaction="admin.php?redo=addmovie">新增電影</button>
      <hr>
        <table width="99%" border="0">
          <tbody>
          <?php
          while($list=$result->fetch_assoc())
		  { 
		  switch ($list['level'])
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
          <tr>
            <td width="36" rowspan="3">
            <button formmethod="post" name="up" formaction="admin.php?redo=delmovie" value="<?php echo $list["id"];?>">向上</button> <div>&nbsp;</div>
            <button formmethod="post" name="down" formaction="admin.php?redo=delmovie" value="<?php echo $list["id"];?>">向下</button>
            </td>
            <td width="152" rowspan="3" align="center" valign="middle"><img src="img/<?php echo $list["post"];?>" width="150"></td>
            <td width="50" rowspan="3" align="center" valign="middle">分級<img src="<?php echo $link;?>" width="30" height="30"></td>
            <td width="88">片名：<?php echo $list["name"];?></td>
            <td width="131">片長：<?php echo $list["period"];?></td>
			<td width="104">上映時間<?php echo $list["date"];?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2" align="right"><button formmethod="post" name="edit" formaction="admin.php?redo=editmovie" value="<?php echo $list["id"];?>">編輯電影</button>&nbsp;&nbsp;<button formmethod="post" name="del" formaction="admin.php?redo=delmovie" value="<?php echo $list["id"];?>">刪除電影</button></td>
            </tr>
          <tr>
            <td height="96" colspan="3">&nbsp;</td>
            </tr>
            <?php
			}
			?>
          <tr>
            <td colspan="6">&nbsp;</td>
          </tr>
          </tbody>
        </table>
        </form>
        </div>
      </div>
    </div>