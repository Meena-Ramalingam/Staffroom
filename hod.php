<!DOCTYPE html>
<html>
<head>
	<title>HOD Dashboard</title>
	
</head>
<style>
body {
	margin: 0;
	padding: 0;
	font-family: Arial, sans-serif;
	
	background-image: url('https://cdnb.artstation.com/p/marketplace/presentation_assets/000/168/111/large/file.jpg?1562718535');
  background-size: cover;

}

header {
	background-color: #333;
	color: #fff;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 10px;
}

header h1 {
	margin: 0;
}

.logout-btn {
	color: #fff;
	background-color: #f44336;
	padding: 10px 20px;
	border-radius: 5px;
	text-decoration: none;
}

.logout-btn:hover {
	background-color: #e53935;
}

main {
	margin: 20px auto;
	width: 80%;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100%;
}

.button-container {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}

.dashboard-btn {
	color: #fff;
	background-color: #4CAF50;
	padding: 50px 100px;
	border-radius: 5px;
	margin: 20px;
	text-decoration: none;
	font-size: 27px;
}

.dashboard-btn:hover {
	background-color: #388E3C;
}

header {
	background-color: #333;
	color: #fff;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 10px;
}

header h1 {
	margin: 0;
}

.logout-btn {
	color: #fff;
	background-color: #f44336;
	padding: 10px 20px;
	border-radius: 5px;
	text-decoration: none;
}

.logout-btn:hover {
	background-color: #e53935;
}

main {
	margin: 20px auto;
	width: 80%;
}

.button-container {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	margin-top: 200px;
}

.dashboard-btn {
	color: #fff;
	background-color: #4CAF50;
	padding: 10px 20px;
	border-radius: 5px;
	margin: 10px;
	text-decoration: none;
	background-color: forestgreen;
}

.dashboard-btn:hover {
	background-color: #388E3C;
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
	<a href="https://calendar.google.com/" target="_blank">Calendar</a>
      <a href="https://www.google.com/url?sa=t&source=web&rct=j&url=http://rajalakshmi.in/&ved=2ahUKEwi7wPXjnuz-AhUaTmwGHX52CYEQFnoECBAQAQ&usg=AOvVaw37hWheP41fVFiiW1T6uGuY">REC Unified</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>
	 
	

	<main>
		<div class="button-container">




			<a href="weeklyreporthod.php" class="dashboard-btn">Weekly Report</a>
			<a href="view_leave_requests.php" class="dashboard-btn">Leave Requests</a>
			<a href="https://drive.google.com/" class="dashboard-btn">Google drive</a>
			
			<a href="https://classroom.google.com/" class="dashboard-btn">Google classroom</a>
			
		</div>
	</main>
</body>
</html>
