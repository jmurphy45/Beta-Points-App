<?php
session_start();
if($_SESSION["level"] == 2 || $_SESSION["level"] == 1){
	echo 1;
	header( "Location: restrict.php" );
}else if($_SESSION["level"] == 4 || $_SESSION["level"] == 3){
	header( "Location: dashboard.php" );
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

mysql_select_db($database_EventTracker, $EventTracker);
$query_addPoints = "SELECT * FROM events where `event_deletion` = 1";
$addPoints = mysql_query($query_addPoints, $EventTracker) or die(mysql_error());
$row_addPoints = mysql_fetch_assoc($addPoints);
$totalRows_addPoints = mysql_num_rows($addPoints);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Beta Points</title>
</head>

<body>
</body>
<p>Adding points for: <?php $username= $_SESSION["username"]; echo $username; ?></p>

<?php
	if(isset($_GET['flag'])) {
    	$error_flag = $_GET['flag'];
	}else{
		$error_flag = 1;
	}
	
	if($error_flag == 0){
		echo "<p>This event can only be entered one time.</p>";
	}else if($error_flag == 3){
		$exp = $_GET['exp'];
		echo "<p>The timeline to enter the event has expired. The expiration date is $exp </p>";	
	}

?>
<form action="betaPointsAdder.php" method="post" name="addPoints" id="addPoints">
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
