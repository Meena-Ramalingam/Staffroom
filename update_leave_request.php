<?php
// Assuming you have a database connection established

$conn = mysqli_connect("localhost", "root", "", "gstaffroom");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestId = $_POST['request_id'];
    $status = '';

    if (isset($_POST['accept'])) {
        $status = 'accepted';
    } elseif (isset($_POST['deny'])) {
        $status = 'denied';
    }

    if (!empty($status)) {
        // Update the leave request status in the database
        $query = "UPDATE leave_requests SET status = '$status' WHERE id = $requestId";
        $result = $conn->query($query); // Replace $conn with your database connection variable

        if ($result === false) {
            die("Error updating leave request: " . $conn->error);
        }

        // Redirect back to the view leave requests page
        header("Location: view_leave_requests.php");
        exit();
    }
}
?>

