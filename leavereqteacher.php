
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Leave Request</title>
	
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
	max-width: 600px;
	margin: 0 auto;
	
	width: 50%;
	margin: 0 auto;
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
<body>
<nav>
    <h1>Welcome</h1>
    <div class="nav-links">
	<a href="https://calendar.google.com/" target="_blank">Calendar</a>
      <a href="teacher.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>
	<div class="container">

		<h1>Teacher Leave Request</h1>
		<form action="submitreq.php" id="leave-form" method="post" onsubmit="return validateForm()">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>


			<label for="from">From:</label>
			<input type="date" id="from" name="from" required>

			<label for="to">To:</label>
			<input type="date" id="to" name="to" required>

			<label for="reason">Reason for Leave:</label>
			<textarea id="reason" name="reason" required></textarea>

			<button type="submit" id="submit-btn">Submit</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		// Form validation using JavaScript
		function validateForm() {
			var name = document.forms["leave-form"]["name"].value;
			var date = document.forms["leave-form"]["date"].value;
			var from = document.forms["leave-form"]["from"].value;
			var to = document.forms["leave-form"]["to"].value;
			var reason = document.forms["leave-form"]["reason"].value;

			if (name == "" || date == "" || from == "" || to == "" || reason == "") {
				alert("Please fill in all fields.");
				return false;
			}

			return true;
		}
	</script>
</body>
</html>

