<?php require_once('Connections/EventTracker.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<title>Login and Sign Up</title>
</head>

<body>
<div class="container">

      <form ACTION="userAuth.php" METHOD="POST" class="form-signin" id="login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="username" type="text" id="username" class="form-control" placeholder="Email address" required="" autofocus=""/>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required=""/>
        <div class="checkbox">
          <label>
            <input name="remember" type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

</div>
    

</body>
</html>