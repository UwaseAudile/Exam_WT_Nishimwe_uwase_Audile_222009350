<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $ApplicationID = $_POST['ApplicationID'];
    $CandidateID = $_POST['CandidateID'];
    $JobID = $_POST['JobID'];
    $DateApplied = $_POST['DateApplied'];
    $Status = $_POST['Status'];
    

    // Update query
    $sql = "UPDATE applications SET CandidateID='$CandidateID',JobID='$JobID',Status='$Status', DateApplied='$DateApplied' WHERE ApplicationID='$ApplicationID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewapplications.php");
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
 