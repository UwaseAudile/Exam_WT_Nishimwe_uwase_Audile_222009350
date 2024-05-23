<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['InterviewID'])) {
    // Sanitize the input
    $InterviewID = $conn->real_escape_string($_POST['InterviewID']);

    // Delete query
    $sql = "DELETE FROM interviews WHERE InterviewID='$InterviewID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewinterviews.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or InterviewID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

