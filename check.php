<?php
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

// Get the leave request ID from the URL parameter
$id = $_GET['id'];

// Retrieve the leave request from the database
$sql = "SELECT * FROM leave_requests WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Check if the leave request has been accepted
    if ($row['accepted'] == 1) {
        echo "Leave request has been accepted by the HOD.";
    } else {
        echo "Leave request is pending approval by the HOD.";
    }
} else {
    echo "Leave request not found.";
}

$conn->close();
?>
