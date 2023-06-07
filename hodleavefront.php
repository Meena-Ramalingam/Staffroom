<!DOCTYPE html>
<html>
<head>
	<title>Leave Requests</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid gray;
		}
		th {
			background-color: lightgray;
		}
		form {
			display: inline-block;
		}
		.accept {
			background-color: green;
            color: white;
			padding: 5px 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		.reject {
			background-color: red;
			color: white;
			padding: 5px 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>Leave Requests</h1>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>From Date</th>
				<th>To Date</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
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
            
            // Get leave requests from database
            $sql = "SELECT * FROM leave_requests WHERE status='Pending'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["from_date"] . "</td>";
                    echo "<td>" . $row["to_date"] . "</td>";
                    echo "<td>" . $row["reason"] . "</td>";
                    echo "<td>";
                    echo "<form action='accept.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                    echo "<input type='submit' value='Accept'>";
                    echo "</form>";
                    echo "<form action='reject.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                    echo "<input type='submit' value='Reject'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "No leave requests.";
            }
            
            mysqli_close($conn);
            ?>
            
		</tbody>
	</table>
</body>
</html>
