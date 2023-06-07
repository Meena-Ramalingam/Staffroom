<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to MySQL database using XAMPP
    $servername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'mydatabase';
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Query database for user with matching username and password
    $sql = 'SELECT * FROM users WHERE username = \'' . $username . '\' AND password = \'' . $password . '\'';
    $result = mysqli_query($conn, $sql);

    // If user found, set session variables and redirect to dashboard
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        header('Location: dashboard.php');
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
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="container">
		<?php if (isset($error)): ?>
		<div class="error"><?php echo $error ?></div>
		<?php endif ?>
		<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<h1>Login</h1>
			<input type="text" placeholder="Username" name="username">
			<input type="password" placeholder="Password" name="password">
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>
