<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form action="add_user.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="usertype">User Type:</label><br>
        <input type="text" id="usertype" name="usertype"><br>
        <input type="submit" value="Add User">
    </form>
</body>
</html>