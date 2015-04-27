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
$query_gateway = "SELECT * FROM gateway";
$gateway = mysql_query($query_gateway, $EventTracker) or die(mysql_error());
$row_gateway = mysql_fetch_assoc($gateway);
$totalRows_gateway = mysql_num_rows($gateway);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
</head>

<body>

<form action="userRegister.php" method="post" name="register" id="register">
	<p>First Name:	<input name="user_first" type="text" pattern="([a-zA-Z]{3,30}\s*)+" required/></p>
    <p>Last Name:	<input name="user_sur" type="text" pattern="[a-zA-Z]{3,30}" required/></p>
    <p>Zeta Number:	<input name="zeta_num" type="text" />
    <p>Asscoiate Member: <input name="associat_member" type="checkbox" value="yes" /></p>
    <p>Email:	<input name="user_email" type="text" required/></p>
    <p>Phone number:	<input name="user_phone" type="text" required/></p>
  <p>Phone Service:	<select name="user_phone_service" required>
      <?php
do {  
?>
      <option value="<?php echo $row_gateway['gid']?>"><?php echo $row_gateway['carrier']?></option>
      <?php
} while ($row_gateway = mysql_fetch_assoc($gateway));
  $rows = mysql_num_rows($gateway);
  if($rows > 0) {
      mysql_data_seek($gateway, 0);
	  $row_gateway = mysql_fetch_assoc($gateway);
  }
?>
    </select></p>
    <p> Username:	<input name="user_username" type="text" required/></p>
    <p>Password:	<input name="user_password" type="password"  required/><p>
    
</form>
<button type="submit" form="register" value="Submit">Submit</button>
</body>
</html>
<?php
mysql_free_result($gateway);
?>
