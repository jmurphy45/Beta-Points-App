<?php
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
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
	
	$query="SELECT * FROM `users` WHERE `user_username` = '$user_username'";
	//$query=mysqli_query($conn, $sql) or trigger_error(mysql_error()." ".$query);
	$result=mysqli_query($conn, $query);
	if(!mysqli_query($conn, $query)){
		echo "false";	
	}
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$num = mysqli_num_rows($result);
/* 	if($row['user_update'] != 0){
		header( "Location: update.php" );
	} */
	if($row['user_username'] == $user_username && $row['user_password'] == $user_password){
		echo "matched";
		if(isset($_POST['remember'])){
			
		}else{
			session_start();
			$_SESSION["username"] = $row['user_username'];
			$_SESSION["zeta"] = $row['user_zeta'];
			$_SESSION["level"] = $row['user_level'];
			//redirect to dashboard
			header( "Location: dashboard.php" );
			
		}
	}else{
		echo "not Matched";
	}
	
	$result=mysqli_query($conn, $query);
	if(!$result){
		die();
		echo "database query not made";  
	}else{
		echo "query is susscesful";	
	}
	mysqli_close($conn);
?>