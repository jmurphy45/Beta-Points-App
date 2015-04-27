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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_EventList = 10;
$pageNum_EventList = 0;
if (isset($_GET['pageNum_EventList'])) {
  $pageNum_EventList = $_GET['pageNum_EventList'];
}
$startRow_EventList = $pageNum_EventList * $maxRows_EventList;

mysql_select_db($database_EventTracker, $EventTracker);
$query_EventList = "SELECT * FROM `events` WHERE `event_deletion` = 1";
$query_limit_EventList = sprintf("%s LIMIT %d, %d", $query_EventList, $startRow_EventList, $maxRows_EventList);
$EventList = mysql_query($query_limit_EventList, $EventTracker) or die(mysql_error());
$row_EventList = mysql_fetch_assoc($EventList);

if (isset($_GET['totalRows_EventList'])) {
  $totalRows_EventList = $_GET['totalRows_EventList'];
} else {
  $all_EventList = mysql_query($query_EventList);
  $totalRows_EventList = mysql_num_rows($all_EventList);
}
$totalPages_EventList = ceil($totalRows_EventList/$maxRows_EventList)-1;

$queryString_EventList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_EventList") == false && 
        stristr($param, "totalRows_EventList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_EventList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_EventList = sprintf("&totalRows_EventList=%d%s", $totalRows_EventList, $queryString_EventList);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td>ID</td>
    <td>Event Name</td>
    <td>Event Points</td>
    <td>Event Start</td>
    <td>Event End</td>
    <td>Event Expiration</td>
    <td>Event Classification</td>
    <td>Event Hidden Status</td>
    <td>Event Multiple Logs</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <?php

  ?>
  <?php do { 
  	if($row_EventList['event_level'] == 3){
		$row_EventList['event_level'] = "Active";
	}else if($row_EventList['event_level'] == 2){
		$row_EventList['event_level'] = "Alum";	
	}else if ($row_EventList['event_level'] == 1){
		$row_EventList['event_level'] = "recruit";
	}
	
	if($row_EventList['event_hidden'] == 0){
		$row_EventList['event_hidden'] = "True";
	}else if($row_EventList['event_hidden'] == 1){
		$row_EventList['event_hidden'] = "False";
	}
	
	if($row_EventList['events_multiple'] == 0){
		$row_EventList['events_multiple'] = "True";
	}else if($row_EventList['events_multiple'] == 1){
		$row_EventList['events_multiple'] = "False";
	}
  
  ?>
    <tr>
      <td><?php echo $row_EventList['event_ID']; ?></td>
      <td><?php echo $row_EventList['event_name']; ?></td>
      <td><?php echo $row_EventList['event_points']; ?></td>
      <td><?php echo $row_EventList['event_start']; ?></td>
      <td><?php echo $row_EventList['event_end']; ?></td>
      <td><?php echo $row_EventList['event_expiration']; ?></td>
      <td><?php echo $row_EventList['event_level']; ?></td>
      <td><?php echo $row_EventList['event_hidden']; ?></td>
      <td><?php echo $row_EventList['events_multiple']; ?></td>
      <td><a href="editevent.php?id=<?php echo $row_EventList['event_ID']; ?>&amp;name=<?php echo $row_EventList['event_name']; ?>&amp;start=<?php echo $row_EventList['event_start']; ?>&amp;end=<?php echo $row_EventList['event_end']; ?>&amp;exp=<?php echo $row_EventList['event_expiration']; ?>&amp;points=<?php echo $row_EventList['event_points']; ?>&amp;multiple=<?php echo $row_EventList['events_multiple']; ?>&amp;hide=<?php echo $row_EventList['event_hidden']; ?>&amp;brothers=<?php echo $row_EventList['event_brothersOnly']; ?>&amp;level=<?php echo $row_EventList['event_level']; ?>">Edit</a></td>
      <td><a href=eventDelete.php?id=<?php echo $row_EventList['event_ID']; ?>>Delete</a></td>
    </tr>
    <?php } while ($row_EventList = mysql_fetch_assoc($EventList)); ?>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_EventList > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_EventList=%d%s", $currentPage, 0, $queryString_EventList); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_EventList > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_EventList=%d%s", $currentPage, max(0, $pageNum_EventList - 1), $queryString_EventList); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_EventList < $totalPages_EventList) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_EventList=%d%s", $currentPage, min($totalPages_EventList, $pageNum_EventList + 1), $queryString_EventList); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_EventList < $totalPages_EventList) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_EventList=%d%s", $currentPage, $totalPages_EventList, $queryString_EventList); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($EventList);
?>
