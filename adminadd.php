<?php
// Check if the form has been submitted
if(isset($_POST['submit'])){
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "staffroom49";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the insert statement
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $sql = "INSERT INTO users (user_id,username,password,user_type) VALUES ('$user_id','$username', '$password', '$user_type')";

    // Execute the insert statement
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<style>
    body {
	
 
	margin: 0;
	padding: 0;
	font-family: Arial, sans-serif;
	
	background-image: url('https://cdnb.artstation.com/p/marketplace/presentation_assets/000/168/111/large/file.jpg?1562718535');
  background-size: cover;


}
.container {
	width: 50%;
	margin: 75px auto;
	padding: 20px;
	background-color: white;
	border-radius: 10px;
}

h1 {
	text-align: center;
    margin: 65px auto;
}

h2 {
	margin-top: 30px;
}

form {
	border: 1px solid #ccc;
	padding: 10px;
	width: 50%;
	margin: auto;#
  background-color:white;
  color:white;
}

label {
	display: block;
	margin-bottom: 5px;
    color:black;
}

input[type="text"],
input[type="password"],
input[type="email"] {
	padding: 5px;
	width: 100%;
	margin-bottom: 10px;
    color:black;
}

input[type="submit"] {
	background-color: #4CAF50;
	color: #fff;
	border: none;
	padding: 10px 20px;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #3e8e41;
}

table {
	border-collapse: collapse;
	width: 80%;
	margin: auto;
}

th, td {
	padding: 10px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}

th {
	background-color: #4CAF50;
	color: #fff;
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
    <h1>Add User</h1>
    <form method="post">
        <label>User id:</label><br>
        <input type="text" name="user_id"required><br>
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>User type:</label><br>
        <input type="text" name="user_type" required><br>

       
        <input type="submit" name="submit" value="Add User">
    </form>
</div>
</body>
</html>