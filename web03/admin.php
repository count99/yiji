<?php include('head.php'); 
$def='adm.php';
if(!isset($_SESSION['name']))
{
	$def='login.php';
}

if(isset($_GET['redo']))
{
	switch($_GET['redo'])
	{
		case 'login':
			$def='login.php';
			break;
		case 'movie':
			$def='movie.php';
			break;
		case 'addmovie':
			$def='add_movie.php';
			break;
		case 'editmovie':
			$def='editmovie.php';
			break;
		case 'delmovie':
			$def='delmovie.php';
			break;
		case 'pre':
			$def='pre.php';
			break;
		case 'delpre':
			$def='delpre.php';
			break;
		case 'adminorder':
			$def='adminorder.php';
			break;
		default:
			$def='adm.php';
			break;
	}
}
?>
<body>
<div id="main">
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index.php">首頁</a> <a href="index.php?redo=orderonline">線上訂票</a> <a href="#">會員系統</a> <a href="admin.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> <a href="?do=admin&redo=tit">網站標題管理</a>| <a href="?do=admin&redo=go">動態文字管理</a>| <a href="admin.php?redo=pre">預告片海報管理</a>| <a href="admin.php?redo=movie">院線片管理</a>| <a href="admin.php?redo=adminorder">電影訂票管理</a> </div>
    <?php include($def);?>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>