<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['JobID'])) {
    // Sanitize the input
    $JobID = $conn->real_escape_string($_POST['JobID']);

    // Delete query
    $sql = "DELETE FROM joblistings WHERE JobID='$JobID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewjoblistings.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or JobID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

a