<?php
ob_start();
session_start(); // start a new session or continues the previous
if (isset($_SESSION['user']) != "") {
	header("Location: home_page.php"); // redirects to home.php
}
include_once 'dbconnect.php';

$error = false;

if (isset($_POST['btn-signup'])) {
	// sanitize user input to prevent sql injection
	$first_name = trim($_POST['first_name']);
	$first_name = strip_tags($first_name);
	$first_name = htmlspecialchars($first_name);

	$last_name = trim($_POST['last_name']);
	$last_name = strip_tags($last_name);
	$last_name = htmlspecialchars($last_name);

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$password = trim($_POST['password']);
	$password = strip_tags($password);
	$password = htmlspecialchars($password);
	// basic name validation
	if (empty($first_name)) {
		$error = true;
		$nameError = " <br>Please enter your full name. ";
	} else if (strlen($first_name) < 3) {
		$error = true;
		$nameError = " <br>Name must have atleat 3 characters.";
	} else if (!preg_match("/^[a-zA-Z ]+$/", $first_name)) {
		$error = true;
		$nameError = "<br> Name must contain alphabets and space.";
	}
	//basic email validation
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$emailError = "Please enter valid email address.";
	} else {
		// check whether the email exist or not
		$query = "SELECT email FROM library_user WHERE email='$email'";
		$res = mysqli_query($conn, $query);
		$count = mysqli_num_rows($res);
		if ($count != 0) {
			$error = true;
			$emailError = "Provided Email is already in use.";
		}
	}
	// password validation
	if (empty($password)) {
		$error = true;
		$passError = "Please enter password.";
	} else if (strlen($password) < 6) {
		$error = true;
		$passError = "Password must have atleast 6 characters.";
	}
	// password hashing for security
	$password = hash('sha256', $password);
	// if there's no error, continue to signup
	if (!$error) {
		$query = "INSERT INTO library_user (first_name,last_name,email,user_password) VALUES('$first_name','$last_name','$email','$password')";
		$res = mysqli_query($conn, $query);
		if ($res) {
			$errTyp = "success";
			$errMSG = "Successfully registered, you may login now";
			unset($first_name);
			unset($last_name);
			unset($email);
			unset($password);
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later...";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
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
			<a class="navbar-brand" href="index.php">MY LIBRARY</a>
		</div>

        <ul class="nav navbar-nav navbar-right">
  			<li role="presentation" class="active"><a href="index.php">Log in</a></li>
		</ul>
  		</div>
</nav>
		<div class="hero-image">
    		<div class="hero">

<h2> Please fill the forms to register! </h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
<?php
if (isset($errMSG)) {
	?>

	<div class="alert alert-<?php echo $errTyp ?>">
	<?php echo $errMSG; ?>
	</div>
	<?php
}
?>
<div class="form-group">
				<label for="exampleFormControlInput1">First name:</label>
				<input type="text" class="form-control" name="first_name"><!--id="exampleFormControlInput1"-->
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput2">Last name:</label>
				<input type="text" class="form-control" name="last_name">
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput3">Email:</label>
				<input type="email" class="form-control" id="inputEmail3" name="email" >
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput4">Password:</label>
				 <input type="password" class="form-control" id="inputPassword3" name="password">
			</div>

			<button type="submit" class="btn-primary" name="btn-signup"> Sign Up</button>

</form>
</div></div>
		</div>
		</div>
	<footer>
		&copy; MY LIBRARY
	</footer>

</body>
</html>
<?php ob_end_flush();?>