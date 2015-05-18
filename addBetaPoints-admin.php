<?php require_once('Connections/EventTracker.php'); ?>
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

mysql_select_db($database_EventTracker, $EventTracker);
$query_users = "SELECT ID, user_firstName, user_lastName FROM users";
$users = mysql_query($query_users, $EventTracker) or die(mysql_error());
$row_users = mysql_fetch_assoc($users);
$totalRows_users = mysql_num_rows($users);

mysql_select_db($database_EventTracker, $EventTracker);
$query_event = "SELECT event_ID, event_name FROM events";
$event = mysql_query($query_event, $EventTracker) or die(mysql_error());
$row_event = mysql_fetch_assoc($event);
$totalRows_event = mysql_num_rows($event);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form action="" method="post" name="addBetaPoints">
	  <select name="activeAccounts">
	    <?php
		do {  
			$name = $row_users['user_lastName'].", ".$row_users['user_firstName'];
?>
	    <option value="<?php echo $row_users['ID']?>"><?php echo $name ?> </option>
	    <?php
} while ($row_users = mysql_fetch_assoc($users));
  $rows = mysql_num_rows($users);
  if($rows > 0) {
      mysql_data_seek($users, 0);
	  $row_users = mysql_fetch_assoc($users);
  }
?>
	  </select>
      <select name="events">
        <?php
do {  
?>
        <option value="<?php echo $row_event['event_ID']?>"><?php echo $row_event['event_name']?></option>
        <?php
} while ($row_event = mysql_fetch_assoc($event));
  $rows = mysql_num_rows($event);
  if($rows > 0) {
      mysql_data_seek($event, 0);
	  $row_event = mysql_fetch_assoc($event);
  }
?>
      </select>
	</form><input name="submit" type="button" value="submit" />
</body>
</html>
<?php
mysql_free_result($users);

mysql_free_result($event);
?>
