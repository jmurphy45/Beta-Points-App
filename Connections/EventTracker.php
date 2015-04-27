<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_EventTracker = "localhost";
$database_EventTracker = "eventtracker";
$username_EventTracker = "root";
$password_EventTracker = "";
$EventTracker = mysql_pconnect($hostname_EventTracker, $username_EventTracker, $password_EventTracker) or trigger_error(mysql_error(),E_USER_ERROR); 
?>