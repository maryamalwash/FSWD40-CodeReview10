<?php

ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
	header("Location: home_page.php"); // redirects to home.php
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
			<a class="navbar-brand" href="#">MY LIBRARY</a>
		</div>

        <ul class="nav navbar-nav navbar-right">
        	<li role="presentation"><a href="publisher.php">publisher</a></li>
  			<li role="presentation" class="active"><a href="index.php">Log out</a></li>
		</ul>
  		</div>
</nav>


<div class="container">
<div class="row">

<?php

$sql = "select media_id, media_type,titel,image,available,ISBN_code,short_desc,author_first_name,author_last_name from media inner join author on fk_author_id =author_id ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {

	echo '<div id="dd" class="card col-sm-3 " >
          <img class="card-img-top" src="', $row["image"], '" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"><b>', $row['titel'], '</b></h4> ', '<h4 class="card-title"><b>', 'Media type : ', $row['media_type'], '</b></h4> ', '<h5 class="card-title"><b>', 'By: ', $row['author_first_name'], $row['author_last_name'], '</b></h5>',
	'<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#', $row["media_id"], '">Read More</button>
          <div id="', $row["media_id"], '" class="collapse">', '<b> Available : </b>', $row['available'], '<br><b> ISBN code : </b>', $row['ISBN_code'], '<br><b>Short description </b>:', $row['short_desc'], '
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