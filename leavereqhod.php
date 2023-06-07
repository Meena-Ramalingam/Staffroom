<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <?php

    // Assuming you have a database connection established
    $conn = mysqli_connect("localhost", "root", "", "gstaffroom");

    // Fetch all leave requests from the database
    $query = "SELECT * FROM leave_requests where status='pending'";

    $result = $conn->query($query); // Replace $conn with your database connection variable

    // Check if there are any leave requests
    if ($result->num_rows > 0) {
        echo '<h2>Leave Requests</h2>';
        echo '<table>';
        echo '<tr><th>Teacher</th><th>From</th><th>To</th><th>Reason</th><th>Status</th><th>Action</th></tr>';
        while ($row = $result->fetch_assoc()) {
            // Display each leave request in a table row
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['from_date'] . '</td>';
            echo '<td>' . $row['to_date'] . '</td>';
            echo '<td>' . $row['reason'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td>';
            // Provide buttons or links to accept or deny the leave request
            echo '<form action="update_leave_request.php" method="POST">';
            echo '<input type="hidden" name="request_id" value="' . $row['id'] . '">';
            echo '<input type="submit" name="accept" value="Accept">';
            echo '<input type="submit" name="deny" value="Deny">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No leave requests found.</p>';
    }

    ?>
</div>
</body>
</html>
