<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $CandidateID = mysqli_real_escape_string($conn, $_POST['CandidateID']);
    $JobID = mysqli_real_escape_string($conn, $_POST['JobID']);
    $OfferStatus = mysqli_real_escape_string($conn, $_POST['OfferStatus']);
    $Salary = mysqli_real_escape_string($conn, $_POST['Salary']);
    $Benefits = mysqli_real_escape_string($conn, $_POST['Benefits']);
    $NegotiationHistory = mysqli_real_escape_string($conn, $_POST['NegotiationHistory']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO offerdetails (CandidateID, JobID, OfferStatus, Salary,Benefits,NegotiationHistory) 
            VALUES ('$CandidateID', '$JobID', '$OfferStatus', '$Salary','$Benefits','$NegotiationHistory')";

    if (mysqli_query($conn, $sql)) {
        echo "offerdetails record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
