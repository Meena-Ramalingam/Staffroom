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
		h1 {
			text-align: center;
		}

		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 70vh;
		}

		.btn {
			display: inline-block;
			padding: 20px 50px;
			margin: 0 20px;
			border: none;
			border-radius: 5px;
			background-color: #4CAF50;
			color: white;
			font-size: 24px;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		.btn:hover {
			background-color: #3e8e41;
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
	<a href="https://calendar.google.com/" target="_blank">Calendar</a>
      <a href="https://www.google.com/url?sa=t&source=web&rct=j&url=http://rajalakshmi.in/&ved=2ahUKEwi7wPXjnuz-AhUaTmwGHX52CYEQFnoECBAQAQ&usg=AOvVaw37hWheP41fVFiiW1T6uGuY">REC Unified</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>
	 
	<h1></h1>
	<div class="container">
		<a href="adminadd.php" class="btn">Add Users</a>
		<a href="admindelete.php" class="btn">Delete Users</a>
	</div>
</body>
</html>