<?php 
if(isset($_POST['submit']))
{
	$wow = new DBhelper();
	$dt = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
//	var_dump($dt,$_FILES);
	
	$wow->insert('movies',['name'=>$_POST['name'],'level'=>$_POST['level'],'period'=>$_POST['period'],'date'=>$dt, 'publisher'=>$_POST['publisher'],'director'=>$_POST['director'],'pre'=>$_FILES['pre']['name'], 'post'=>$_FILES['post']['name'],'story'=>$_POST['story']]);
	move_uploaded_file($_FILES['post']['tmp_name'], "img/".$_FILES['post']['name']);
	move_uploaded_file($_FILES['pre']['tmp_name'], "mov/".$_FILES['pre']['name']);
	echo "<script>location.href='admin.php?redo=movie';</script>";
}
?>
<form action="admin.php?redo=addmovie" method="post" enctype="multipart/form-data">
  <table width="771" height="642" border="0">
    <tr>
      <td width="83" align="center" valign="top">影片資料</td>
      <td width="678" align="center"><table width="623" height="368" border="0">
        <tr>
          <td width="139">片名：</td>
          <td width="474"><label for="name"></label>
            <input type="text" name="name" id="name"></td>
        </tr>
        <tr>
          <td>分級：</td>
          <td><p>
            <label for="level"></label>
            <select name="level" id="level">
              <option value="1">普通級</option>
              <option value="2">保護級</option>
              <option value="3">輔導級</option>
              <option value="4">限制級</option>
            
            </select>
            （普通級、保護級、輔導級、限制級)</p></td>
        </tr>
        <tr>
          <td>片長：</td>
          <td><label for="period"></label>
            <input type="text" name="period" id="period"></td>
        </tr>
        <tr>
          <td>上映日期：</td>
          <td><label for="year"></label>
          
            <select name="year" size="1" id="year">
              <option value="2017">2017</option>
              <option value="2018">2018</option>
            </select>
            年
            <label for="month"></label>
            <select name="month" id="month">
            	<?php for($i=1;$i<=12;$i++)
				{
            	echo "<option value='".$i."'>".$i."</option>";
				}
				?>
            </select>
            月
            <label for="day"></label>
            <select name="day" id="day">
            	<?php for($i=1;$i<=31;$i++)
				{
            	echo "<option value='".$i."'>".$i."</option>";
				}
				?>
            </select>
            日</td>
        </tr>
        <tr>
          <td>發行商：</td>
          <td><label for="publisher"></label>
            <input type="text" name="publisher" id="publisher"></td>
        </tr>
        <tr>
          <td>導演：</td>
          <td><label for="director"></label>
            <input type="text" name="director" id="director"></td>
        </tr>
        <tr>
          <td>預告影片：</td>
          <td><label for="pre"></label>
            <input type="file" name="pre" id="pre"></td>
        </tr>
        <tr>
          <td height="91">電影海報：</td>
          <td><label for="post"></label>
            <input type="file" name="post" id="post"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="224" align="center" valign="top">劇情簡介</td>
      <td align="center"><p>
        <label for="story"></label>
        <textarea name="story" id="story" cols="45" rows="5"></textarea>
      </p>
      <p> 
        <input type="submit" name="submit" id="submit" value="新增">&nbsp;&nbsp;
         <input type="reset" name="reset" id="reset" value="重置">
      </p>
      </td>
    </tr>
  </table>






</form>