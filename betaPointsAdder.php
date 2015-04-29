<?php
	session_start();
	$username = $_SESSION["username"];
	$zeta = $_SESSION["zeta"];
	$betapoint_evntID = $_POST['events'];
	$date = date("Y-m-d h:s:u");
	$expiration;
	$servername = "localhost";
  	$username = "root";
  	$password = "";
	$event_name;
	$error_flag=1;
	
  
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

	$query="SELECT * FROM `events` WHERE `event_ID` = '$betapoint_evntID' LIMIT 1";
	$result=mysqli_query($conn, $query);
	if(!$result){
		die();
		echo "database query not made";  
	}else{
		echo "query is susscesful";	
	}
	
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$event_name = $row['event_name'];
	$event_mult = $row['events_multiple'];
	$expiration = $row['event_expiration'];
	echo $event_name;
	
	if($date > $row['event_expiration']){
		$error_flag = 3;
		header( "Location: addpoints.php?flag=$error_flag&exp=$expiration" );
	}
	if($event_mult == 0){
		$query="INSERT INTO `eventsandusers`(`ID`, `username`, `zeta_num`, `event_ID`, `event_name`, `time_stamp`) VALUES (NULL,'$username','$zeta','$betapoint_evntID','$event_name','$date')";
		$result=mysqli_query($conn, $query);
		if(!$result){
			die();
			echo "database query not made";  
		 }else{
			 echo "query is susscesful";	
		 }
		 //header( "Location: addpoints.php?flag=$error_flag" );
	}else{
		echo "You can only enter this event in once";
		$error_flag = 0;
		header( "Location: addpoints.php?flag=$error_flag" );
	}
	
	
?>