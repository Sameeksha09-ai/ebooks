<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="sign.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" value="<?php echo $username; ?>" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm password">
    </div>
	<div class="input-group">
		<label>Registration Number</label>
		<input type="text" name="register number"required pattern="[a-zA-Z0-9]+">
    </div>
	<div class="input-group">
		<label>Contact Number</label>
		<input type="tel"pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" name="Enter contact number">
    </div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="enter email" value="<?php echo $email; ?>">
    </div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>