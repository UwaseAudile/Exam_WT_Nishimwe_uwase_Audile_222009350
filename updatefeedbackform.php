<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $FeedbackID = $_POST['FeedbackID'];
    $InterviewID  = $_POST['InterviewID '];
    $FeedbackType = $_POST['FeedbackType'];
    $Comments = $_POST['Comments'];
    $InterviewerName = $_POST['InterviewerName'];
    $Date = $_POST['Date'];
    

    // Update query
    $sql = "UPDATE feedback SET InterviewID ='$InterviewID ', FeedbackType='$FeedbackType',Comments='$Comments', InterviewerName='$InterviewerName',Date='$Date' WHERE FeedbackID='$FeedbackID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewfeedback.php");
    } else {
        echo "Error updating record: " .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
 