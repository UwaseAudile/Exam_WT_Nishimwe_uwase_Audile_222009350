<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $CandidateID = mysqli_real_escape_string($conn, $_POST['CandidateID']);
    $JobID = mysqli_real_escape_string($conn, $_POST['JobID']);
    $Status = mysqli_real_escape_string($conn, $_POST['Status']);
    $DateApplied = mysqli_real_escape_string($conn, $_POST['DateApplied']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO applications (CandidateID, JobID, Status, DateApplied) 
            VALUES ('$CandidateID', '$JobID', '$Status', '$DateApplied')";

    if (mysqli_query($conn, $sql)) {
        echo "applications record added successfully.";
        header("Location: Dashboarduser.html");

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
