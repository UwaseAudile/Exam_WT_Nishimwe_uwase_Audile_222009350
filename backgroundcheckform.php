<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $CandidateID = mysqli_real_escape_string($conn, $_POST['CandidateID']);
    $TypeOfCheck = mysqli_real_escape_string($conn, $_POST['TypeOfCheck']);
    $Status = mysqli_real_escape_string($conn, $_POST['Status']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO backgroundcheck (CandidateID, TypeOfCheck, Status, Date) 
            VALUES ('$CandidateID', '$TypeOfCheck', '$Status', '$Date')";

    if (mysqli_query($conn, $sql)) {
        echo "backgroundcheck record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
