<?php 

  $event_name = $_POST["event_name"];
  $event_location = $_POST["event_location"];
  $event_contact = $_POST["event_contact"];
  $event_description = $_POST["event_description"];
  $event_start = $_POST["event_start"];
  $event_end = $_POST["event_end"];
  $event_expiration = $_POST["event_expiration"];
  $event_level;
  $event_points = $_POST["event_points"];
  $event_hidden;
  $event_multiple;
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  

	if($_POST['event_level'] == 'Active'){
		$event_level = 3;
	}else if($_POST['event_level'] == 'Alum'){
		$event_level = 2;
	}else{
		$event_level = 1;
	}

	if($_POST['event_hidden'] == 'Yes'){
		$event_hidden = 0;
	}else{
		$event_hidden = 1;
	}

	if($_POST['event_multiple'] == 'Yes'){
		$event_multiple = 0;
	}else{
		$event_multiple = 1;
	}
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
	$query="INSERT INTO `events`(`event_ID`, `event_name`, `event_location`, `event_contact`, `event_points`, `event_start`, `event_end`, `event_expiration`, `event_level`, `event_brothersOnly`, `event_hidden`, `events_multiple`, `event_deletion`) VALUES (NULL,'$event_name','$event_location','$event_contact','$event_points','$event_start','$event_end','$event_expiration','$event_level',0,'$event_hidden','$event_multiple',0);";
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