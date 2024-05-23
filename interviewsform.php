<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $CandidateID = mysqli_real_escape_string($conn, $_POST['CandidateID']);
    $JobID = mysqli_real_escape_string($conn, $_POST['JobID']);
    $InterviewerID = mysqli_real_escape_string($conn, $_POST['InterviewerID']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);
    $Time = mysqli_real_escape_string($conn, $_POST['Time']);
    $Location = mysqli_real_escape_string($conn, $_POST['Location']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO interviews (CandidateID,JobID,InterviewerID,Date,Time,Location) 
            VALUES ('$CandidateID', '$JobID','$InterviewerID','$Date','$Time','$Location')";

    if (mysqli_query($conn, $sql)) {
        echo "interviews record added successfully.";
   
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
