<?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <div class="container">
  	<h2>Login</h2>
  </div>
  <form method="post" action="login.php">
  	<?php include('errors2.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" class="a1" name="username" placeholder="Enter your name" required>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" class="a1" name="psw" placeholder="Enter your password" required>
  	</div>
  	<div class="input-group">
	  <form action="newindex.php" method="post" enctype="multipart/form-data">
  	  <button type="submit" class="btn" name="reg_user" >Login</button>
  	</div>
  </form>
</body>
</html>