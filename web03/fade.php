<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery-1.9.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
$(document).ready(function(){
	$('#t1').mouseenter(function(){
		$(this).slideToggle();
		})
	$('#t1').mouseleave(function(){
		$(this).toggle();
		})
	});
</script>
<img id="t1" src="Profile page_files/03B20.png" width="325" height="360"/>
</body>
</html>
<?php
$a = date("Ymd");

var_dump($a);