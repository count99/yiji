<?php
$data = new DBhelper();
$sql = "SELECT * FROM pre ORDER BY id ASC";
$result = $data->conn->query($sql);
//var_dump($data);
if(isset($_POST['submit2']))
{
	$test = new DBhelper();
	$test->insert('pre',['name'=>$_POST['name2'], 'pre'=>$_FILES['pre']['name']]);
	copy($_FILES['pre']['tmp_name'],"img/".$_FILES['pre']['name']);
	echo "<script>location.href='admin.php?redo=pre';</script>";
}

if(isset($_POST['submit1']))
{
	//var_dump($_POST['effect'],$_SESSION);
   $test = new DBhelper();
	if(isset($_POST['del']))
	{
	  foreach($_POST['del'] as $k=>$v)
	  {  
		$test->delete('pre',['id'=>$k]);
	  }
	}
	
	if(isset($_POST['view']))
	{
	  foreach($_POST['view'] as $k=>$v)
	  {  
		$test->update('pre',['view'=>1],['id'=>$k]);
	  }
	}
	else
	{
		$all=$test->select('pre');
		foreach($all as $k=>$v)
		{
		  $test->update('pre',['view'=>0],['id'=>$v['id']]);
		}
	}
	
	if(isset($_POST['name']))
	{
	  foreach($_POST['name'] as $k=>$v)
	  {  
		$test = new DBhelper();
		$test->update('pre',['name'=>$v],['id'=>$k]);
	  }
	}
	
	if(isset($_POST['effect']))
	{
		$oo = new DBhelper();
		$oo->update('effect',['effect'=>$_POST['effect']],['id'=>1]);
	}
	echo "<script>location.href='admin.php?redo=pre';</script>";
	
}



?>
<div id="mm">
   <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
      	 <div>
         <?php
          while($list=$result->fetch_assoc())
		  { 
		  ?>
      		<form name="op" action="admin.php?redo=pre" method="post">
            
                          <table width="633" border="0">
                <tr>
                  <td colspan="4" align="center"><h1>預告片清單</h1></td>
                  </tr>
                <tr>
                  <td width="175" align="center">預告片海報</td>
                  <td width="175" align="center">預告片片名</td>
                  <td width="94" align="center">預告片排序</td>
                  <td width="171" align="center">操作</td>
                </tr>
                <tr>
                  <td align="center"><img src="img/<?php echo $list['pre'];?>" width="150"/></td>
                  <td align="center">
                  <label for="name"></label>
                  <input type="text" name="name[<?php echo $list["id"];?>]" id="name" value="<?php echo $list['name'];?>"/>
                  </td>
                  <td align="center">
                  		<button formmethod="post" name="up" formaction="admin.php?redo=delpre" value="<?php echo $list["id"];?>">向上</button> 
                        <div>&nbsp;</div>
            			<button formmethod="post" name="down" formaction="admin.php?redo=delpre" value="<?php echo $list["id"];?>">向下</button>
                  </td>
                  <td align="center"><input name="view[<?php echo $list["id"];?>]" type="checkbox" id="view" value="1" <?php if($list['view']){echo "checked";}?>/>
                  <label for="view">展示
                    <input type="checkbox" name="del[<?php echo $list["id"];?>]" id="del" />
                    刪除
                  </label></td>
                </tr>
                <?php 
				} 
				?>
                <tr>
                  <td colspan="4" align="center"><label for="effect"></label>
                   特效選擇
                    <select name="effect" id="effect">
                      <option value="1">淡入</option>
                      <option value="2">縮放</option>
                      <option value="3">滑出</option>
                    </select>
                    <input type="submit" name="submit1" id="submit1" value="修改" />
                  <input type="reset" name="reset1" id="reset1" value="重置" /></td>
                  </tr>
              </table>
            </form>
  		</div>
        <hr>
        <div>
        <form name="new" action="admin.php?redo=pre" method="post" enctype="multipart/form-data">
        <table width="634" border="0">
        <tr>
          <td colspan="2" align="center"><h1>新增預告片海報</h1></td>
          </tr>
        <tr>
          <td width="333" align="center">預告片海報：
            <label for="pre"></label>
            <input type="file" name="pre" id="pre" /></td>
          <td width="291" align="center">預告片片名：
            <label for="name2"></label>
            <input type="text" name="name2" id="name2" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit2" id="submit2" value="新增" />
            <input type="submit" name="reset2" id="reset2" value="重置" /></td>
          </tr>
      </table>

        </form>
        </div>
     </div>
  </div>
</div>