<?php include('server2.php')?>
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
  <form method="post" action="teacherlogin.php">
  	<?php include('errors2.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" class="a1" name="username" placeholder="Enter your name" required>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" class="a1" name="password" placeholder="Enter your password" required>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="teacher_login" >Login</button>
  	</div>
  </form>
</body>
</html>