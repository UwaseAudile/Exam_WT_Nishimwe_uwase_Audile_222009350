<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $InterviewID = $_POST['InterviewID'];
    $CandidateID = $_POST['CandidateID'];
    $JobID = $_POST['JobID'];
    $InterviewerID = $_POST['InterviewerID'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
    $Location = $_POST['Location'];
    // Update query
    $sql = "UPDATE interviews SET CandidateID='$CandidateID', JobID='$JobID',InterviewerID='$InterviewerID',Date='$Date',Time='$Time',Location='$Location' WHERE InterviewID='$InterviewID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewinterviews.php");
    } else {
        echo "Error updating record: " .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error JobID
    echo "Form submission method not allowed.";
}
?>
 