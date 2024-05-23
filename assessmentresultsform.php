<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $CandidateID = mysqli_real_escape_string($conn, $_POST['CandidateID']);
    $AssessmentType = mysqli_real_escape_string($conn, $_POST['AssessmentType']);
    $Score = mysqli_real_escape_string($conn, $_POST['Score']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);
     $Feedback = mysqli_real_escape_string($conn, $_POST['Feedback']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO assessmentresults (CandidateID, AssessmentType, Score,Date,Feedback) 
            VALUES ('$CandidateID', '$AssessmentType', '$Score','$Date','$Feedback')";

    if (mysqli_query($conn, $sql)) {
        echo "assessmentresults record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
