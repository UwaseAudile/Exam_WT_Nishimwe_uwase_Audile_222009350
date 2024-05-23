<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['AssessmentID'])) {
    // Sanitize the input
    $assessmentresultsID = $conn->real_escape_string($_POST['AssessmentID']);

    // Delete query
    $sql = "DELETE FROM assessmentresults WHERE AssessmentID='$assessmentresultsID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewassessmentresults.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or assessmentresultsID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

