<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "staffroom49";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$id = $_POST["id"];

// Update leave request status in database
$sql = "UPDATE leave_requests SET status='Accepted' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
	echo "Leave request accepted successfully.";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
