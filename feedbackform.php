<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $InterviewID = mysqli_real_escape_string($conn, $_POST['InterviewID']);
    $FeedbackType = mysqli_real_escape_string($conn, $_POST['FeedbackType']);
    $Comments = mysqli_real_escape_string($conn, $_POST['Comments']);
    $InterviewerName = mysqli_real_escape_string($conn, $_POST['InterviewerName']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO feedback (InterviewID, FeedbackType,  Comments,InterviewerName,Date) 
            VALUES ('$InterviewID', '$FeedbackType', '$InterviewerName', '$Comments','$Date')";

    if (mysqli_query($conn, $sql)) {
        echo "feedback record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
