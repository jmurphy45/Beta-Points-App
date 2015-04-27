<?php ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<title>Add event</title>
</head>
<body>
	<form action="eventAdder.php" method="post" id="form1">
    	<p>Event Name:	<input name="event_name" type="text" /></p>
        <p>Event location:	<input name="event_location" type="text" /></p>
        <p>Event Contact:	<input name="event_contact" type="text" /></p>
      	<p>Event Start Date:	<input name="event_start" type="date" data-format="dd/MM/yyyy hh:mm:ss" /></p>
      	<p>Event End Date:	<input name="event_end" type="date" data-format="dd/MM/yyyy hh:mm:ss" /></p>
      	<p>Event expiration Date:	<input name="event_expiration" type="date" /></p>
      	<p>Event Level:	<select name="event_level">
      	  <option>Active</option>
      	  <option>Alum</option>
      	  <option>Recuitment</option>
      	</select>
   	  </p>
      	<p>Points Value:	<input name="event_points" type="text"></p>
      	<p>Hide Event:	<select name="event_hidden">
      	  <option>Yes</option>
      	  <option>No</option>
   	  	</select></p>
        <p>Multiple Event Recording: <select name="event_multiple">
          <option>Yes</option>
          <option>No</option>
        </select></p>
        <p>Event Description: 	<br/><textarea name="event_description" cols="36" rows="12"></textarea></p>
    </form>
    <button type="submit" form="form1" value="Submit">Submit</button>
</body>
</html>