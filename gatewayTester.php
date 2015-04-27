<?php 
	$user_phonenumber = $_POST['user_phone'];;
	$user_gatewayID = $_POST['user_phone_service'];
	
	
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
	
	$query="SELECT `address` FROM `gateway` WHERE gid = `$user_gatewayID` LIMIT 1";
	
	
	$result=mysqli_query($conn, $query);
	if(!$result){
		die();
		echo "database query not made";  
	}else{
		echo "query is susscesful";	
	}

	
	$completAddress = $user_phonenumber.$address;
 
	mysqli_error($conn);
	$conn->close();
	
	$msg = "This is a test message";
	
	mail($address,"test",$msg);
?>