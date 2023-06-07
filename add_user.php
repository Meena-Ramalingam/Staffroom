
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Enter your password
$dbname = "staffroom49"; // Enter your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // it's good to hash password
$usertype = $_POST['usertype'];

$sql = "INSERT INTO Users (id,name, password, usertype) VALUES (?,?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $password, $usertype);

if ($stmt->execute()) {
  echo "New user created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
