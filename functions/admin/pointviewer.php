<?php
	$servername = "localhost";
  	$username = "root";
  	$password = "";
	session_start();
	$zeta_num = $_SESSION["zeta"];
  
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	if(!$conn){
	  $e = oci_error();
	  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);  
	}else{
	  echo "connection made";  
	}
	$db_selected = mysqli_select_db($conn, 'EventTracker');
    if(!$db_selected){
	  die();
	 echo "database not selected";  
	}else{
		echo "database was selected";	
	}
	
	$query="SELECT * FROM `eventsandusers` WHERE `zeta_num` = '$zeta_num'";
	//$query=mysqli_query($conn, $sql) or trigger_error(mysql_error()." ".$query);
	$result=mysqli_query($conn, $query);

	var_dump($result);
	
	$row = mysqli_fetch_assoc($result);
	$total_rows =  mysqli_num_rows($result);
?>