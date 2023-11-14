<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
  <div class="header">
  	<h2>Sign up</h2>
  </div>
  <form method="post" action="server.php">
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
		<input type="password" name="confirm_password">
    </div>
	<div class="input-group">
		<label>Registration Number</label>
		<input type="text" name="register_number"required pattern="[a-zA-Z0-9]+">
    </div>
	<div class="input-group">
		<label>Contact Number</label>
		<input type="tel" name="contact_number">
    </div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
    </div>
  	<div class="input-group">
		<input type="submit" class="btn" name="reg_user" value="submit">
	<p>
  		Already a member? <a href="login.php">Login</a>
  	</p>
  </form>
</body>
</html>