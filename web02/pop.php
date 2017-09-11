<script src="web02/home_files/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(){
	$('.hide').hide();
	});
	
function xx(uu){
	$('#h'+uu).show();
}

function aa()
{
	$(".hide").hide();
}
</script>
<?php require_once('Connections/db02.php'); ?>
<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];



$maxRows_new = 5;
$pageNum_new = 0;
if (isset($_GET['pageNum_new'])) {
  $pageNum_new = $_GET['pageNum_new'];
}
$startRow_new = $pageNum_new * $maxRows_new;

mysql_select_db($database_db02, $db02);
mysql_query("SET NAMES 'utf8'");
$query_new = "SELECT *, (SELECT count(*)as zang FROM zang WHERE post_id=news.id)as zang FROM news ORDER BY zang DESC";
$query_limit_new = sprintf("%s LIMIT %d, %d", $query_new, $startRow_new, $maxRows_new);
$new = mysql_query($query_limit_new, $db02) or die(mysql_error());
$row_new = mysql_fetch_assoc($new);

if (isset($_GET['totalRows_new'])) {
  $totalRows_new = $_GET['totalRows_new'];
} else {
  $all_new = mysql_query($query_new);
  $totalRows_new = mysql_num_rows($all_new);
}
$totalPages_new = ceil($totalRows_new/$maxRows_new)-1;

$queryString_new = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_new") == false && 
        stristr($param, "totalRows_new") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_new = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_new = sprintf("&totalRows_new=%d%s", $totalRows_new, $queryString_new);
?>
<fieldset>
  <legend>目前位置：首頁&nbsp;&nbsp;>&nbsp;&nbsp;人氣文章區</legend>
  <table width="662" border="0">
    <tr>
      <td width="151" height="43" align="center">標題</td>
      <td width="251" align="center">內容</td>
      <td width="246" align="center">人氣</td>
    </tr>
    <?php 
	$inx = 1;
	do { 
		if(!empty($_SESSION['MM_Username'])){
		mysql_select_db($database_db02, $db02);
		$query_zanglook = "SELECT * FROM zang WHERE post_id =".$row_new['id']." AND user_id='".$_SESSION['MM_Username']."'";
		$zanglook = mysql_query($query_zanglook, $db02) or die(mysql_error());
		$row_zanglook = mysql_fetch_assoc($zanglook);
		$totalRows_zanglook = mysql_num_rows($zanglook);
		//var_dump($row_zanglook);
		}
	?>
      <tr>
        <td align="center"><?php echo $row_new['title']; ?></td>
        
        <?php echo '
        <td align="center">
        <div id="s'.$inx.'" onMouseOver="xx('.$inx.')" onmouseleave="aa()">'.substr($row_new["post"],0,50).'
		</div>
		<div class="hide" id="h'.$inx.'" style="position: absolute;background-color:#6FF; display:block; width:500px;">
		  '.$row_new["post"].'
		</div>		
		</td>
        <td align="center">'.$row_new["zang"]. '個人說
		<img src="web02/icon/02B03.jpg" width="30">';
		?>
		
        <?php if(isset($_SESSION['MM_Username']))
		{
			if($totalRows_zanglook>0)
				{
					
					echo"<a href='index.php?do=buzang&id=".$row_new['id']."'/>收回讚</a>";
				}	
		
			else
			{
				echo "<a href='index.php?do=zang&id=".$row_new['id']."'/>讚</a>";
			}
		}
			?>
			</td>
      </tr>
      <?php 
	  $inx++;
	  } while ($row_new = mysql_fetch_assoc($new)); 
	  ?>
  <tr>
    <td height="56" colspan="3" align="center"><a href="<?php printf("%s?pageNum_new=%d%s", $currentPage, max(0, $pageNum_new - 1), $queryString_new); ?>"> < </a>
	<?php for($i=1; $i<$totalPages_new+2;$i++)
			{
				if($i==($pageNum_new+1)){echo "<span style='font-size:24px;color:red;'>".$i."<span>";
			}
			else
			{
				echo "<span style='font-size:16px;color:black;'>".$i."<span>";
			}
			}
			?>
	
	<a href="<?php printf("%s?pageNum_new=%d%s", $currentPage, min($totalPages_new, $pageNum_new + 1), $queryString_new); ?>"> > </a></td>
    </tr>
  </table>
</fieldset>

<?php
mysql_free_result($new);

@mysql_free_result($zanglook);

?>
