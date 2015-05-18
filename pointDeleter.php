<?php 
	$servername = "localhost";
  	$username = "root";
  	$password = "";
 
  
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	if(!$conn){
	  $e = oci_error();
	  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);  
	}else{
	  echo "connection made"."\r\n";  
	}
	$db_selected = mysqli_select_db($conn, 'EventTracker');
    if(!$db_selected){
	  die();
	 echo "database not selected"."\r\n";  
	}else{
		echo "     "."database was selected";	
	}
	
	$point_ID = $_GET['ID'];
	$query="DELETE FROM `eventsandusers` WHERE `ID` = '$point_ID'";
	$result=mysqli_query($conn, $query);
	if(!$result){
		die();
		echo "database query not made";  
	}else{
		echo "query is susscesful";	
	}
	header( "Location: viewpoints.php" );
?>