<?php
	$id = $_POST['event_ID'];
	echo $id;
	$event_name = $_POST["event_name"];
	$event_start = $_POST["event_start"];
	$event_end = $_POST["event_end"];
	$event_expiration = $_POST["event_expiration"];
	$event_level;
	$event_points = $_POST["event_points"];
	$event_hidden;
	$event_multiple;
	$event_brothersOnly;
	
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
	  
	  
  	echo "stopped";
	  $query="UPDATE events SET event_name='$event_name', event_start='$event_start', event_end='$event_end', event_expiration='$event_expiration', event_points='$event_points' WHERE event_ID='$id'";
	  echo $query;
	  $result=mysqli_query($conn, $query);
	  if(!$result){
		  die();
		  echo "database query not made";  
	  }else{
		  echo "query is susscesful";	
	  }
   
	  mysqli_error($conn);
	  $conn->close();
	  
	  echo "finished script"
?>