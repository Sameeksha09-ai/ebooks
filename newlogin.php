<?php 
  session_start(); 

  if (isset($_SESSION['username'])) {
    header('location: newindex.php');
  }

  if (isset($_POST['login_user'])) {
    // Perform your login validation here
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example validation - you should replace this with your actual validation logic
    if ($username == 'example' && $password == 'password') {
      $_SESSION['username'] = $username;
      header('location: newindex.php');
    } else {
      $_SESSION['error'] = "Invalid username or password";
      header('location: newlogin.php');
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>

  <form method="post" action="newlogin.php">

    <!-- Display validation errors here -->
    <?php if (isset($_SESSION['error'])) : ?>
      <div class="error">
        <strong><?php echo $_SESSION['error']; ?></strong>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif ?>

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" required>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" required>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
  </form>

</body>
</html>
