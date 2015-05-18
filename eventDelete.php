<?php
	$id = $_GET['id'];
	$servername = "localhost";
  	$username = "root";
  	$password = "";
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
	$query="UPDATE events SET event_deletion=0 WHERE event_ID='$id'";
	$result=mysqli_query($conn, $query);
	if(!$result){
		die();
		echo "database query not made";  
	}else{
		echo "query is susscesful";	
	}
 
	mysqli_error($conn);
	$conn->close();

?>