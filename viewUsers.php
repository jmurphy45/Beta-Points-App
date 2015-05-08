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

$maxRows_view_actives = 10;
$pageNum_view_actives = 0;
if (isset($_GET['pageNum_view_actives'])) {
  $pageNum_view_actives = $_GET['pageNum_view_actives'];
}
$startRow_view_actives = $pageNum_view_actives * $maxRows_view_actives;

mysql_select_db($database_EventTracker, $EventTracker);
$query_view_actives = "SELECT ID, user_zeta, user_firstName, user_lastName, user_email, user_phoneNumber, user_username, user_level FROM users WHERE user_level = 3";
$query_limit_view_actives = sprintf("%s LIMIT %d, %d", $query_view_actives, $startRow_view_actives, $maxRows_view_actives);
$view_actives = mysql_query($query_limit_view_actives, $EventTracker) or die(mysql_error());
$row_view_actives = mysql_fetch_assoc($view_actives);

if (isset($_GET['totalRows_view_actives'])) {
  $totalRows_view_actives = $_GET['totalRows_view_actives'];
} else {
  $all_view_actives = mysql_query($query_view_actives);
  $totalRows_view_actives = mysql_num_rows($all_view_actives);
}
$totalPages_view_actives = ceil($totalRows_view_actives/$maxRows_view_actives)-1;
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
    <td>user_zeta</td>
    <td>user_firstName</td>
    <td>user_lastName</td>
    <td>user_email</td>
    <td>user_phoneNumber</td>
    <td>user_username</td>
    <td>user_level</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_view_actives['ID']; ?></td>
      <td><?php echo $row_view_actives['user_zeta']; ?></td>
      <td><?php echo $row_view_actives['user_firstName']; ?></td>
      <td><?php echo $row_view_actives['user_lastName']; ?></td>
      <td><?php echo $row_view_actives['user_email']; ?></td>
      <td><?php echo $row_view_actives['user_phoneNumber']; ?></td>
      <td><?php echo $row_view_actives['user_username']; ?></td>
      <td><?php echo $row_view_actives['user_level']; ?></td>
    </tr>
    <?php } while ($row_view_actives = mysql_fetch_assoc($view_actives)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($view_actives);
?>
