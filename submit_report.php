<!DOCTYPE html>
<html>
<head>
	<title>Weekly Report Submission</title>
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
			padding: 20px;
            background-color: rgba(0, 0, 0, 0.4);
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			text-align: center;

            
		}
		h1 {
			margin-bottom: 30px;
		}
		p {
			font-size: 18px;
			margin-bottom: 30px;
			color:white;
		}
		button {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		button:hover {
			background-color: #3e8e41;
		}
        .dashboard-btn {
  display: inline-block;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.dashboard-btn:hover {
  background-color: #3e8e41;
}
	</style>
</head>
<body>
	<div class="container">
		<h1></h1>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "staffroom49";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$name = $_POST['name'];
			$subject = $_POST['subject'];
			$class = $_POST['class'];
			$hours = $_POST['hours'];
			$topics = $_POST['topics'];
			$description = $_POST['description'];
			$date = date('Y-m-d H:i:s');

			// Check for required fields
			if (empty($name) || empty($subject) || empty($class) || empty($hours) || empty($topics) || empty($description)) {
				echo "<p>Error: All fields are required.</p>";
				echo "<button onclick=\"window.location.href='dashboard.php'\">Go Back</button>";
				exit();
			}

			// Insert data into database
			$sql = "INSERT INTO weekly_reports (name, subject, class, hours, topics, description, date_of_submission)
			VALUES ('$name', '$subject', '$class', '$hours', '$topics', '$description', '$date')";

			if ($conn->query($sql) === TRUE) {
				echo "<p>Weekly report submitted successfully</p>";
			} else {
				echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
			}

			$conn->close();
            ?>
			<div class="button-container">
			<a href="teacher.php" class="dashboard-btn">GO BACK</a>
            </div>
	</div>
    
</body>
</html>
