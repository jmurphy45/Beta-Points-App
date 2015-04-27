
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<title>Edit event</title>
</head>
<body>
	
<form action="eventEditer.php" method="post" id="form2">
		<p>Event ID:	<input name="event_ID" type="text"  value="<?php echo $_GET['id']; ?>" size="5" readonly="readonly" ></p>
    	<p>Event Name:	<input value="<?php echo $_GET['name']; ?>" name="event_name" type="text"  /></p>
      	<p>Event Start Date:	<input value="<?php echo $_GET['end']; ?>" name="event_start" type="date" data-format="dd/MM/yyyy hh:mm:ss" /></p>
      	<p>Event End Date:	<input value="<?php echo $_GET['start']; ?>" name="event_end" type="date" data-format="dd/MM/yyyy hh:mm:ss" /></p>
      	<p>Event expiration Date:	<input value="<?php echo $_GET['exp']; ?>" name="event_expiration" type="date" /></p>
      	<p>Event Level:	<select selected="" name="event_level">
        <?php 
			$data =  $_GET['level'];
			if($data == "Active"){
				echo "	     	  <option selected>Active</option>
      	  <option>Alum</option>
      	  <option>Recuitment</option>";
			}else if($data == "Alum"){
				echo "	      	  <option selected>Active</option>
      	  <option>Alum</option>
      	  <option>Recuitment</option>";
			}else{
				echo "	      	  <option selected>Active</option>
      	  <option>Alum</option>
      	  <option selected>Recuitment</option>";
			}
		?>
      	</select>
   	  </p>
      	<p>Points Value:	<input value="<?php echo $_GET['points']; ?>"name="event_points" type="text"></p>
      	<p>Hide Event:	<select name="event_hidden">
        <?php 
			$data =  $_GET['hide'];
			if($data == "True"){
				echo "	<option selected>Yes</option>
          <option>No</option>";
			}else{
				echo "	<option>Yes</option>
          <option selected>No</option>";
			}
		?>
</select></p>
        <p>Multiple Event Recording:	 <select name="event_multiple">
        <?php 
			$data =  $_GET['multiple'];
			if($data == "True"){
				echo "	<option selected>Yes</option>
          <option>No</option>";
			}else{
				echo "	<option>Yes</option>
          <option selected>No</option>";
			}
		?>
</select></p>
        <p>Brothers Only: <select name="event_brothersOnly">
          <?php 
			$data =  $_GET['brothers'];
			if($data == "True"){
				echo "	<option selected>Yes</option>
          <option>No</option>";
			}else{
				echo "	<option>Yes</option>
          <option selected>No</option>";
			}
		?>
</select></p>
    </form>
    <button type="submit" form="form2" value="Submit">Submit</button>
</body>
</html>

