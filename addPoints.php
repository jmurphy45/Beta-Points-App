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
$query_addPoints = "SELECT * FROM events";
$addPoints = mysql_query($query_addPoints, $EventTracker) or die(mysql_error());
$row_addPoints = mysql_fetch_assoc($addPoints);
$totalRows_addPoints = mysql_num_rows($addPoints);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
<p>Adding points for:</p>
<form action="" method="post" name="addPoints" id="addPoints">
  <select name="events">
    <?php
do {  
?>
    <option value="<?php echo $row_addPoints['event_ID']?>"><?php echo $row_addPoints['event_name']?></option>
    <?php
} while ($row_addPoints = mysql_fetch_assoc($addPoints));
  $rows = mysql_num_rows($addPoints);
  if($rows > 0) {
      mysql_data_seek($addPoints, 0);
	  $row_addPoints = mysql_fetch_assoc($addPoints);
  }
?>
  </select>
</form>
<button type="submit" form="addPoints" value="Submit">Submit</button>
</html>
<?php
mysql_free_result($addPoints);
?>
