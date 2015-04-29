<?php
session_start();
if($_SESSION["level"] == 2){
	echo 1;
	header( "Location: restrict.php" );
}else if($_SESSION["level"] == 4){
	header( "Location: restrict.php" );
}else if($_SESSION["level"] == 1){
	header( "Location: restrict.php" );
}
?>
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

$colname_viewpoints = "-1";
if (isset($_SESSION['zeta'])) {
  $colname_viewpoints = $_SESSION['zeta'];
}
mysql_select_db($database_EventTracker, $EventTracker);
$query_viewpoints = sprintf("SELECT ID, event_name, time_stamp FROM eventsandusers WHERE zeta_num = %s ORDER BY time_stamp DESC", GetSQLValueString($colname_viewpoints, "text"));
$viewpoints = mysql_query($query_viewpoints, $EventTracker) or die(mysql_error());
$row_viewpoints = mysql_fetch_assoc($viewpoints);
$totalRows_viewpoints = mysql_num_rows($viewpoints);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view Beta Points</title>
</head>

<body>
<table border="1">
  <tr>
    <td>ID</td>
    <td>Event Name</td>
    <td>Time Entered</td>
    <td>Delete</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_viewpoints['ID']; ?></td>
      <td><?php echo $row_viewpoints['event_name']; ?></td>
      <td><?php echo $row_viewpoints['time_stamp']; ?></td>
      <td><a href="pointDeleter.php?ID=<?php echo $row_viewpoints['ID']; ?>">Delete</a></td>
    </tr>
    <?php } while ($row_viewpoints = mysql_fetch_assoc($viewpoints)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($viewpoints);
?>
