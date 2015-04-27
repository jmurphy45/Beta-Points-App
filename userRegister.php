<?php require_once('configuration/config.php'); ?>
<?php
	$user_firstName = $_POST['user_first'];
	$user_lastName = $_POST['user_sur'];
	$user_email = $_POST['user_email'];
	$user_phoneNumber = $_POST['user_phone'];
	$gateway_ID = $_POST['user_phone_service'];
	echo $gateway_ID;
	$user_username = $_POST['user_username'];
	echo $user_username;
	$user_password = $_POST['user_password'];
	$user_level = 1;
	if($_post['associat_member'] = "yes"){
		$user_zeta = md5($user_lastName.$user_firstName, false);
	}else if($_post['associat_member'] != "yes"){
		$user_zeta = $_POST['zeta_num'];
	}
	
	
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
	
	$sql="SELECT * FROM `users` WHERE `user_username` = '$user_username'";
	$query=mysqli_query($conn, $sql) or trigger_error(mysql_error()." ".$query);
	//$result=mysqli_query($conn, $query);
	$num = mysqli_num_rows($query);
	var_dump($num);
	
	if($num == 0){
		$query="INSERT INTO `users`(`ID`, `user_zeta`, `user_firstName`, `user_lastName`, `user_email`, `user_phoneNumber`, `gateway_ID`, `user_username`, `user_password`, `user_level`) VALUES (NULL,'$user_zeta','$user_firstName','$user_lastName','$user_email','$user_phoneNumber','$gateway_ID','$user_username','$user_password','$user_level')";
		$result=mysqli_query($conn, $query);
		if(!$result){
			die();
			echo "database query not made";  
		}else{
			echo "query is susscesful";	
		}
		
	}else{
		//header('Location: userRegistration.php')
	}
	mysqli_close($conn);
  

	
	
	//if ($send_mail == true){
		//$subject = "Lambda Chi Alpha Registration";
		//$msg = "Thank you for registering";
		//mail($user_email,$subject,$msg);
	//}
	
	
	//header('Location: .php');

	//header('Location: userRegistration.php')
	
?>