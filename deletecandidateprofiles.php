<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CandidateID'])) {
    // Sanitize the input
    $candidateprofilesID = $conn->real_escape_string($_POST['CandidateID']);

    // Delete query
    $sql = "DELETE FROM candidateprofiles WHERE CandidateID='$candidateprofilesID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewcandidateprofiles.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or candidateprofilesID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

