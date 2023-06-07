<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to MySQL database using XAMPP
    $servername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'staffroom49';
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Query database for user with matching username and password
    $sql = 'SELECT * FROM users WHERE username = \'' . $username . '\' AND password = \'' . $password . '\'';
    $result = mysqli_query($conn, $sql);

    // If user found, set session variables and redirect to appropriate page based on user type
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type'];

        if ($row['user_type'] == 'admin') {
            header('Location: admin.php');
        } elseif ($row['user_type'] == 'teacher') {
            header('Location: teacher.php');
        } elseif ($row['user_type'] == 'hod') {
            header('Location: hod.php');
        } else {
            header('Location: student.php');
        }
    } else {
        $error = 'Invalid username or password';
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			background-color: #232323;
			font-family: Arial, sans-serif;
			color: #fff;
			padding: 0;
			margin: 0;
		   

}         .h1{
	           color:#fff
	  
             }
		

		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;

		}

		.form {
			background-color: rgba(0, 0, 0, 0.6);
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0 5px 10px rgba(0,0,0,0.5);
			max-width: 400px;
			width: 100%;
		}

		.form h1 {
			margin: 0 0 20px;
			font-size: 32px;
			text-align: center;
			
		}

		.form input[type="text"], .form input[type="password"] {
			background-color: #444;
			border: none;
			border-radius: 3px;
			padding: 10px;
			margin-bottom: 20px;
			width: 100%;
			color: #fff;
			font-size: 16px;
		}

		.form input[type="submit"] {
			background-color: #00bfff;
			border: none;
			color: #fff;
			padding: 10px;
			border-radius: 3px;
			font-size: 16px;
			cursor: pointer;
			width: 100%;
			transition: background-color 0.3s ease-in-out;
		}

		.form input[type="submit"]:hover {
			background-color: #00a3cc;
		}
	</style>
</head>
<body>
	<div class="container">
        <h1>STAFFROOM</h1>
		<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<h1>Login</h1>
			<input type="text" placeholder="Username" name="username">
			<input type="password" placeholder="Password" name="password">
			<input type="submit" value="Login">
		</form>
	</div>
    <script>
		function validateForm() {
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;

			if (username == "" || password == "") {
				alert("Please enter both username and password.");
				return false;
			}

			return true;
		}
	</script>
</body>
</html>
