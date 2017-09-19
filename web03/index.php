<?php include('head.php'); 
$def='def.php';
if(isset($_GET['redo']))
{
	switch($_GET['redo'])
	{
		case 'orderonline':
			$def='orderonline.php';
			break;
		case 'show':
			$def='show.php';
			break;
		case 'stage':
			$def='stage.php';
			break;
		case 'finishorder':
			$def='finishorder.php';
			break;
		default:
			$def='def.php';
			break;
	}
}
?>
<body>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index.php">首頁</a> <a href="index.php?redo=orderonline">線上訂票</a> <a href="#">會員系統</a> <a href="admin.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <?php include($def); ?>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>