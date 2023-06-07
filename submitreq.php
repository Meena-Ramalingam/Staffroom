<?php
// Get the form data
$name = $_POST['name'];

$from = $_POST['from'];
$to = $_POST['to'];
$reason = $_POST['reason'];

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$database = "staffroom49";
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}
$name = $_POST['name'];
$from = $_POST['from'];
$to = $_POST['to'];
$reason = $_POST['reason'];

// Save the leave request to the database
$sql = "INSERT INTO leave_requests (name, from_date, to_date, reason, status) VALUES ('$name', '$from', '$to', '$reason', 'pending')";

if (mysqli_query($conn, $sql)) {
    echo "Leave request saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
