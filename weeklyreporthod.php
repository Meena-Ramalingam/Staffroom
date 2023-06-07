<!DOCTYPE html>
<html>
<head>
	<title>HOD Portal</title>
	
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

header a {
	color: #fff;
	text-decoration: none;
	padding: 10px 20px;
	background-color: #4CAF50;
	border-radius: 5px;
}

main {
	margin: 60px auto;
	width: 80%;
}

h2 {
	margin-top: 0;
}

table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	padding: 10px;
	text-align: left;
}

th {
	background-color: #333;
	color: #fff;
}

tbody tr{
	background-color: #f2f2f2;
}

tbody tr:hover {
	background-color: #ddd;
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
      <a href="hod.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </div>
  </nav>

	<main>
	

		
			<tbody>
				<?php include 'get_reports.php'; ?>
			</tbody>
		</table>
	</main>

	<script >
		// get the table rows from the server using AJAX
const table = document.querySelector("table tbody");

const xhr = new XMLHttpRequest();

xhr.onload = function() {
  table.innerHTML = this.responseText;
};

xhr.open("GET", "get_reports.php");
xhr.send();

	</script>
</body>
</html>
