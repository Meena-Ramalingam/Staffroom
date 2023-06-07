<!DOCTYPE html>
<html>
<head>
	<title>Leave Request</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		label {
			margin: 10px 0;
			font-weight: bold;
		}
		input[type="text"], input[type="date"], select {
			padding: 5px;
			margin: 5px 0;
			border-radius: 5px;
			border: 1px solid gray;
			width: 300px;
		}
		input[type="submit"] {
			background-color: green;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			width: 200px;
			margin-top: 10px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>Leave Request Form</h1>
	<form action="meenareq.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" name="name" required>
		<label for="from_date">From Date:</label>
		<input type="date" name="from_date" required>
		<label for="to_date">To Date:</label>
		<input type="date" name="to_date" required>
		<label for="reason">Reason:</label>
		<select name="reason" required>
			<option value="sick">Sick</option>
			<option value="vacation">Vacation</option>
			<option value="personal">Personal</option>
			<option value="other">Other</option>
		</select>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
