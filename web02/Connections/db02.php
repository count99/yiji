<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db02 = "localhost";
$database_db02 = "db02";
$username_db02 = "root";
$password_db02 = "1234";
$db02 = mysql_pconnect($hostname_db02, $username_db02, $password_db02) or trigger_error(mysql_error(),E_USER_ERROR); 
?>