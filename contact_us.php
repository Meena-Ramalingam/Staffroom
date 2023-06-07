<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>

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
	margin: 100px auto;
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
	color: green;
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
</style>
</head>
	<script>
		// Validation code
		function validateForm() {
			var name = document.forms["contactForm"]["name"].value;
			var email = document.forms["contactForm"]["email"].value;
			var subject = document.forms["contactForm"]["subject"].value;
			var message = document.forms["contactForm"]["message"].value;

			if (name == "" || email == "" || subject == "" || message == "") {
				alert("All fields are required");
				return false;
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="contactForm" onsubmit="return validateForm()">
			<h2>Contact Us</h2>
			<label>Name</label>
			<input type="text" name="name" placeholder="Enter your name">
			<label>Email</label>
			<input type="email" name="email" placeholder="Enter your email">
			<label>Subject</label>
			<input type="text" name="subject" placeholder="Enter subject">
			<label>Message</label>
			<textarea name="message" placeholder="Enter your message"></textarea>
			<input type="submit" name="submit" value="Send">
		</form>
	</div>

	<?php
	// Database connection code
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPassword = "";
	$dbName = "staffroom49";

	$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

	// Check if the form is submitted
	if (isset($_POST['submit'])) {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		// Insert data into the database
		$sql = "INSERT INTO contact_us (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
		mysqli_query($conn, $sql);

		// Send email
		$to = "youremail@example.com";
		$subject = "Contact Form Submission";
		$body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
		$headers = "From: $email";

		if (mail($to, $subject, $body, $headers)) {
			echo "<script>alert('Thank you for contacting us. We will respond to your message as soon as possible.');</script>";
		} else {
			echo "<script>alert('Failed to send email. Please try again later.');</script>";
		}
	}

	// Close database connection
	mysqli_close($conn);
	?>
</body>
</html>


