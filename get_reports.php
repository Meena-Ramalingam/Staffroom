<?php
	// Connect to database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "staffroom49";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Retrieve data from database
	$sql = "SELECT * FROM weekly_reports ORDER BY date_of_submission DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<table>";
		echo "<tr><th>Name</th><th>Subject</th><th>Class</th><th>Hours</th><th>Topics Covered</th><th>Description</th><th>Date of Submission</th></tr>";
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["name"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["class"] . "</td><td>" . $row["hours"] . "</td><td>" . $row["topics"] . "</td><td>" . $row["description"] . "</td><td>" . $row["date_of_submission"] . "</td></tr>";
		}
		echo "</table>";
	} else {
		echo "No weekly reports submitted yet";
	}

	$conn->close();
?>
