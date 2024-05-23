<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['FeedbackID'])) {
    // Sanitize the input
    $feedbackID = $conn->real_escape_string($_POST['FeedbackID']);

    // Delete query
    $sql = "DELETE FROM feedback WHERE FeedbackID='$feedbackID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewfeedback.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or feedbackID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

