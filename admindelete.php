<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<style>
	body {
	margin: 0;
	padding: 0;
	font-family: Arial, sans-serif;
	background-image: url('https://cdnb.artstation.com/p/marketplace/presentation_assets/000/168/111/large/file.jpg?1562718535');
  background-size: cover;
}

	.container {
	max-width: 600px;
	margin: 0 auto;
	
	width: 50%;
	margin: 75px auto;
	padding: 20px;
	background-color: #f2f2f2;
	border-radius: 10px;
}


h1 {
	text-align: center;
	margin-bottom: 30px;
}

form {
	display: flex;
	flex-direction: column;
}

label {
	margin-bottom: 10px;
	font-weight: bold;
}

input[type="date"], textarea {
	padding: 10px;
	margin-bottom: 20px;
	border-radius: 5px;
	border: 1px solid #ccc;
}

textarea {
	resize: vertical;
}

button[type="submit"] {
	background-color: #4CAF50;
	color: #fff;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	margin-top: 20px;
}

button[type="submit"]:hover {
	background-color: #3e8e41;
}

#status {
	margin-top: 20px;
	font-weight: bold;
	text-align: center;
}
#submit{
    background-color:forestgreen;
}
/* Apply styles to the table headers */
th {
  background-color: ;
  color: #555;
  font-weight: bold;
  padding: 10px;
}

/* Apply styles to the delete button */
button.delete {
  background-color: #f44336;
  border: none;
  color: #fff;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Change the background color of the delete button on hover */
button.delete:hover {
  background-color: #d32f2f;
}
nav { 
	  position: fixed;
	  top: 0;
      width: 99%;
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
	
      <a href="https://www.google.com/url?sa=t&source=web&rct=j&url=http://rajalakshmi.in/&ved=2ahUKEwi7wPXjnuz-AhUaTmwGHX52CYEQFnoECBAQAQ&usg=AOvVaw37hWheP41fVFiiW1T6uGuY">REC Unified</a>
      <a href="admin.php" target="_blank">Go back</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>

	<div class="container">
	<h1>Admin Page</h1>
	<table>
		<tr>
		    <th>UserId</th>
		    <th>Username</th>
			<th>Password</th>
			<th>User Type</th>
			<th>Delete</th>
		</tr>
		<?php
			// Connect to the database
			$conn = new mysqli("localhost", "root", "", "staffroom49");

			// Check for errors
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// If the delete button is clicked, delete the user
			if (isset($_POST['delete'])) {
				$user_id = $_POST['user_id'];

				$sql = "DELETE FROM users WHERE user_id = $user_id";

				if ($conn->query($sql) === TRUE) {
					echo "User deleted successfully";
				} else {
					echo "Error deleting user: " . $conn->error;
				}
			}

			// Retrieve and display user information
			$sql = "SELECT * FROM users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['user_id'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['password'] . "</td>";
					echo "<td>" . $row['user_type'] . "</td>";
					echo "<td>";
					echo "<form method='post'>";
					echo "<input type='hidden' name='user_id' value='" . $row['user_id'] . "'>";
					echo "<input type='submit' name='delete' value='Delete' class='delete-btn'>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='4'>No users found</td></tr>";
			}

			// Close the database connection
			$conn->close();
		?>
	</table>
		</div>
</body>
</html>
