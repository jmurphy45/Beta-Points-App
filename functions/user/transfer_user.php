<?php
//error flag
$error=0;
//declare variables
$user_username = $_POST['username'];
$user_password = $_POST['password'];
$zeta_num = $_POST['zeta_num'];
$servername = "localhost";
$username = "root";
$password = "";

//connect to old database
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

//connect to new datbase
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
//make query to check for user name in old data base


//check if user exists in old database
	if(num == 1){
		//save the elements from old database into variables 
		//to add into new database


		//make sql statements to add into new data base

		//redirect to login page or sucess page
	}else{
		//redict to the the registration page 
		$error = 1;
		header(string);
	}




?>