<?php 
	
	$hostname = 'localhost';
	$username = 'root';
	$password =	'';
	$database =	'db_elearning';
	
	$conn = new mysqli($hostname, $username, $password, $database);
	if ($conn->connect_error) {
		echo die("Connection_failed " .$conn->connect_error);
	} 
 ?>