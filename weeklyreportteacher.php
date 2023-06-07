<!DOCTYPE html>
<html>
<head>
	<title>Weekly Report Form</title>
	
	<script type="text/javascript">
		function timestamp() {
			document.getElementById("timeStamp").value = new Date();
		}
	</script>
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
	margin: 60px auto;
	padding: 20px;
	background-color: #f2f2f2;
	border-radius: 10px;
}
h1 {
	text-align: center;
}
form {
	display: flex;
	flex-direction: column;
}
label {
	margin-top: 10px;
	font-weight: bold;
}
input[type="text"], input[type="number"], textarea {
	padding: 5px;
	border-radius: 5px;
	border: none;
}
input[type="submit"] {
	margin-top: 10px;
	background-color: #4CAF50;
	color: white;
	border: none;
	border-radius: 5px;
	padding: 10px;
	cursor: pointer;
}
input[type="submit"]:hover {
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
      <a href="teacher.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>
	
	<div class="container">
	
		<h1>Weekly Report Form</h1>
		<form action="submit_report.php" method="post">
    <!-- Form fields go here -->
   
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>

		<label for="subject">Subject:</label>
		<input type="text" id="subject" name="subject" required>

		<label for="class">Class:</label>
		<input type="text" id="class" name="class" required>

		<label for="hours">Class Hours:</label>
		<input type="number" id="hours" name="hours" min="1" required>

		<label for="topics">Topics Covered:</label>
		<textarea id="topics" name="topics" rows="5" required></textarea>

		<label for="description">Description:</label>
		<textarea id="description" name="description" rows="10" required></textarea>

		<input type="hidden" id="timestamp" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>">

		<input type="submit" name="submit" value="Submit">
		
</form>
	
	</div>
	<script>
		<script>
	document.querySelector('form').addEventListener('submit', (event) => {
		event.preventDefault(); // prevent the form from submitting normally

		// get the form data
		const formData = new FormData(event.target);

		// send the form data to the server
		const xhr = new XMLHttpRequest();
		xhr.open('POST', 'submit_report.php')
		
		xhr.onreadystatechange = () => {
			if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					// handle the response from the server
					console.log(xhr.responseText);
				} else {
					// handle errors
					console.error(`Error ${xhr.status}: ${xhr.statusText}`);
				}
			}
		};
		xhr.send(formData);
	});
</script>



</body>
</html>
