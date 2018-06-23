<?php

ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
	header("Location: publisher.php");
}
include_once 'dbconnect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title> MY LIBRARY</title>
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
  			<li role="presentation" class="active"><a href="index.php">Log out</a></li>
		</ul>
  		</div>
</nav>


<div class="container">
<div class="row">

<?php

$sql = "select media_id, media_type,titel,available,ISBN_code,pub_name,pub_size,pub_address from media inner join publisher on fk_publisher_id = publisher_id ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {

	echo '<div id="dc" class="card col-sm-3 ">
          <div class="card-body">
            <h4 class="card-title"><b>', ' publisher name :</b> ', $row['pub_name'], '</h4> ',

	'<div>', '<b>Publisher Address : </b>:', $row['pub_address'], '<br><b>Publisher Size : </b>', $row['pub_size']
	, '<br> <b>Media Type :</b> ', $row['media_type'], '<br> <b>Title :</b> ', $row['titel'], '<br>', '<b> Available : </b>', $row['available'], '<br><b> ISBN code : </b>', $row['ISBN_code'], '
          </div>

          </div></div>
        ';
}

?>

</div>



</div>
<footer>
    &copy; MY LIBRARY
  </footer
</body>
</html>