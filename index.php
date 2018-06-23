<?php

ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
	header("Location: home_page.php"); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;

if (isset($_POST['btn-login'])) {

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$password = trim($_POST['password']);
	$password = strip_tags($password);
	$password = htmlspecialchars($password);

	if (empty($email)) {
		$error = true;
		$emailError = "Please enter your email address.";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$emailError = "Please enter valid email address.";
	}

	if (empty($password)) {
		$error = true;
		$passError = "Please enter your password.";
	}

	// password hashing for security
	$password = hash('sha256', $password);

	if (!$error) {

		$res = mysqli_query($conn, "SELECT first_name, last_name, user_password FROM library_user WHERE email='$email'");
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

		if ($count == 1 && $row['user_password'] == $password) {
			$_SESSION['user'] = $row['user_id'];
			header("Location: home_page.php");
		} else {
			$errMSG = "Incorrect Credentials, Try again...";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My library</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  		<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">MY LIBRARY</a>
		</div>
  		</div>
	</nav>



    	<div class="hero-image">
    		<div class="hero-text">Welcome to MY LAIBRARY!</div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

          <div class="form-group row">

            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">

          </div>
          <div class="form-group row">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
          </div>
          <div class="form-group row">
              <button type="submit" class="btn btn-primary col-md-offset-4 col-lg-offset-4 col-sm-offset-4" name="btn-login"> Log in</button>
          </div>
          <h3>if you dont have an account register now!</h3>
          <div class="form-group row">
          <button type="submit" class="btn btn-primary col-md-offset-4 col-lg-offset-4 col-sm-offset-4"><a href="register.php" id="aa">Register</a></button>
          </div>

    </form>
</div>
	<footer>
		&copy; MY LIBRARY
	</footer>
</body>
</html>



