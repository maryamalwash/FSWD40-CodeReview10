<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr10_Maryam_Alwash_biglibrary');
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (!$conn) {
	die("connection failed :" . mysql_error());
}
?>