<?php include('DBhelper.php');?>
<fieldset>
<legend>目前位置&nbsp;：&nbsp;首頁&nbsp; > &nbsp;問卷調查 ></legend>
 <p>&nbsp;</p>
 <table width="468" height="107" border="0">
   <tr>
     <td width="116" align="center">編號</td>
     <td width="119" align="center">問卷題目</td>
     <td width="83" align="center">投票總數</td>
     <td width="55" align="center">結果</td>
     <td width="73" align="center">狀態</td>
   </tr>
   <?php 
   $new = new DBhelper();
   $result = $new->conn->query("SELECT *, sum(choice) FROM que GROUP by question");
	while($row=$result->fetch_assoc()){
		//var_dump($date);
   ?>
   <tr>
     <td align="center"><?php echo $row['id'];?></td>
     <td align="center"><?php echo $row['question'];?></td>
     <td align="center"><?php echo $row['sum(choice)'];?></td>
     <td align="center"><?php echo "<a href=\"?do=queshow&id=".$row['question']."\">結果</a>" ?></td>
     <td align="center">
	 <?php 
	 if(!isset($_SESSION['MM_Username']))
	 {
		 echo "請先登入";
	 }
	 else
	 {
		 echo "<a href=\"?do=vote&id=".$row['question']."\">參與投票</a>";
	 }
	 ?>
     </td>
   </tr>
   <?php }?>
 </table>