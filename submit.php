<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weekly_reports";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//get form data
$subject = $_POST["subject"];
$class = $_POST["class"];
$classHours = $_POST["classHours"];
$topics = $_POST["topics"];
$description = $_POST["description"];
$timeStamp = $_POST["timeStamp"];

//insert data into database
$sql = "INSERT INTO reports (subject, class, class_hours, topics_covered, description, timestamp)
		VALUES ('$subject', '$class', '$classHours', '$topics', '$description', '$timeStamp')";
if ($conn->query($sql) === TRUE) {
	echo "Weekly report submitted successfully.";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$weekNumber = date("W");
$tableName = "week_" . $weekNumber;
$sql = "CREATE TABLE IF NOT EXISTS report (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		subject VARCHAR(30) NOT NULL,
		class VARCHAR(30) NOT NULL,
		class_hours INT(2) NOT NULL,
		topics_covered TEXT NOT NULL,
		description TEXT NOT NULL,
		timestamp DATETIME NOT NULL
	)";

$conn->close();
?>
