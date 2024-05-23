<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UserID'])) {
    // Sanitize the input
    $usersID = $conn->real_escape_string($_POST['UserID']);

    // Delete query
    $sql = "DELETE FROM users WHERE UserID='$usersID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewuser.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or usersID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

