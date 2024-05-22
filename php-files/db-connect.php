<?php
  $server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "db_photography";

  // Establishing connection to the database
	$con = mysqli_connect($server, $username, $password, $db_name);

  // Checking if the connection is successful
	if (!$con) {
		die("Connection Failed: " . mysqli_connect_error());
	}
?>