<?php
session_start();

// initializing variables
$username1 = "";
$password1 = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ebooks');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username1 = mysqli_real_escape_string($db, $_POST['username']);
  $password1 = mysqli_real_escape_string($db, $_POST['psw']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username1)) { array_push($errors, "Username is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  

  // first check the database to make sure 
  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password1 = md5($password1);//encrypt the password before saving in the database

  	$query = "INSERT INTO login1 (username,psw) 
  			  VALUES('$username1', '$password1')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username1;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: newindex.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username1 = mysqli_real_escape_string($db, $_POST['username']);
  $password1 = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username1)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password1)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM login1 WHERE username='$username1' AND psw='$password1'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username1;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: newindex.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
//Teacher login
if (isset($_POST['teacher_login'])) {
    $username1 = mysqli_real_escape_string($db, $_POST['username']);
    $password1 = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username1)) {
        array_push($errors, "Username is required");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password1);
        $query = "SELECT * FROM login1 WHERE username='$username1' AND psw='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username1;
          $_SESSION['success'] = "You are now logged in";
          header('location: newindex.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
?>