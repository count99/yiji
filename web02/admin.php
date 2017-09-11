<?php include('head.php');
$po = "user.php";
if(isset($_GET['do'])){
	switch ($_GET['do']){
		
		case "login":
			$po = "login.php";
			break;
		case "logout":
			$po = "logout.php";
			break;
		case "user":
			$po = "user.php";
			break;
		case "news":
			$po = "news.php";
			break;
		case "queadd":
			$po = "queadd.php";
			break;	
		default:
			$po = "user.php";
			break;
	}}
?>
<body>

<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<iframe name="back" style="display:none;"></iframe>
	<div id="all">
    	<div id="title">
        <?php echo date("m 月 d號 l")."| 今日瀏覽:".$_SESSION['visit_today']."| 累積瀏覽:".$_SESSION['visit_total'];?><a href="index.php" style="float:right;">回首頁</a>
        </div>
        <div id="title2">
              <img src="icon/02B01.jpg" width="1024" height="120" alt="健康促進網" /> </div>
        <div id="mm">
        	
      <div class="hal" id="lef">
          <a class="blo" href="?do=user">帳號管理</a>
          <a class="blo" href="#">分類網誌</a>
          <a class="blo" href="?do=news">最新文章管理</a>
          <a class="blo" href="#">講座訊息</a>
          <a class="blo" href="?do=queadd">問卷管理</a>
      </div>
      
           <div class="hal" id="main">
            	<div>
            		
               	  <div style="right: 25px; width: 18%; display: inline-block;">
                    	<div style="float:left; position: absolute;"><marquee>請民眾踴躍投稿電子報,讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee></div>
                    	<div style="position: absolute; float:right; right:10px; width:25%;">
						<?php if(!isset($_SESSION['MM_Username']))
								{
									echo '<a href="?do=login" style="right: 5px; top: 5px; position: absolute;">會員登入</a>';
								}
								else
								{
									echo "歡迎".$_SESSION['MM_Username'];
									echo '<a href="admin.php"><button>管理</button><strong>|</strong><a href="?do=logout"><button>登出</button></a>';
								}
							
						?>
					</div>	
                   	</div>
                    
                    
                    	<div class="content" style="top:30px; position: absolute;">
                		          <?php include($po);?>              
                                                
                        </div>
                </div>
            </div>
        </div>
<?php include('foot.php');?>       