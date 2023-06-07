<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://cdnb.artstation.com/p/marketplace/presentation_assets/000/168/111/large/file.jpg?1562718535');
  background-size: cover;

        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            
        }
        h2{
            color:white;
        }
        p{
            color:white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color:white;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        button {
            padding: 10px;
            margin-top: 20px;
            background-color:forestgreen;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Assuming you have a database connection established
$conn = mysqli_connect("localhost", "root", "", "gstaffroom");

// Fetch pending leave requests for the logged-in teacher
$name = $_POST['name'];
$query = "SELECT * FROM leave_requests where name='$name'";

$result = $conn->query($query);
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if there are any pending leave requests
if ($result->num_rows > 0) {
    echo '<h2>Previous Leave Requests</h2>';
    echo '<table>';
    echo '<tr><th>From Date</th><th>To Date</th><th>Reason</th><th>Status</th></tr>';
    while ($row = $result->fetch_assoc()) {
        // Display each pending leave request in a table row
        echo '<tr>';
        echo '<td>' . $row['from_date'] . '</td>';
        echo '<td>' . $row['to_date'] . '</td>';
        echo '<td>' . $row['reason'] . '</td>';
	  echo '<td>' . $row['status'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No pending leave requests found.</p>';
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $fromDate = $_POST['from-date'];
    $toDate = $_POST['to-date'];
    $reason = $_POST['reason'];

    // Store the leave request details in the database
    $query = "INSERT INTO leave_requests (name, from_date, to_date, reason) VALUES ('$name', '$fromDate', '$toDate', '$reason')";

$result = mysqli_query($conn, $query);

    // Display a success message
    echo "<p>Leave request submitted successfully!</p>";
}
?>
<button onclick="location.href='teacher.php'">Go Back</button>
</div>
</body>
</html>
