<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $AssessmentID = $_POST['AssessmentID'];
    $CandidateID = $_POST['CandidateID'];
    $AssessmentType = $_POST['AssessmentType'];
    $Score = $_POST['Score'];
    $Date = $_POST['Date'];
    $Feedback = $_POST['Feedback'];
    

    // Update query
    $sql = "UPDATE assessmentresults SET  CandidateID='$CandidateID', AssessmentType='$AssessmentType', Score='$Score',  Date='$Date',Feedback='$Feedback' WHERE AssessmentID='$AssessmentID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewassessmentresults.php");
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
 