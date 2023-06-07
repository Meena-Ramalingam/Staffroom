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
            margin: 60px auto;
            padding: 20px;
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
		input[type="submit"][name="accept"] {
    background-color: #4CAF50; /* this is a green color */
    color: white;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}

input[type="submit"][name="deny"] {
    background-color: #f44336; /* this is a red color */
    color: white;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
nav {
	  position: fixed;
	  top: 0;
      width: 100%;
	  background-color: rgba(0, 0, 0, 0.6);
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }
    
    nav h1 {
      margin: 0;
      padding-left: 10px;
    }
    
    .nav-links {
      display: flex;
      align-items: center;
    }
    
    .nav-links a {
      color: #fff;
      text-decoration: none;
      padding: 10px;
    }


    </style>
</head>
<body>
<nav>
    <h1>Welcome</h1>
    <div class="nav-links">
	<a href="https://calendar.google.com/" target="_blank">Calendar</a>
      <a href="hod.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>
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
