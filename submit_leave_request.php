<?php
	$name = $_POST['name'];
	
	$from = $_POST['from'];
	$to = $_POST['to'];
	$reason = $_POST['reason'];

	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "staffroom49";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Insert the leave request into the database
	$sql = "INSERT INTO leave_requests (name, from_date, to_date, reason)
			VALUES ('$name',  '$from', '$to', '$reason')";

	if ($conn->query($sql) === TRUE) {
		echo 'success';
	} else {
		echo 'error';
	}

	$conn->close();
?>
