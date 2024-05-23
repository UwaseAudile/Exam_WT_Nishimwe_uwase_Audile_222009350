<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $OfferID = $_POST['OfferID'];
    $CandidateID = $_POST['CandidateID'];
    $JobID = $_POST['JobID'];
    $OfferStatus = $_POST['OfferStatus'];
    $Salary = $_POST['Salary'];
    $Benefits = $_POST['Benefits'];
    $NegotiationHistory = $_POST['NegotiationHistory'];
    

    // Update query
    $sql = "UPDATE offerdetails SET CandidateID='$CandidateID',JobID='$JobID', OfferStatus='$OfferStatus', Salary='$Salary',Benefits='$Benefits',NegotiationHistory='$NegotiationHistory' WHERE OfferID='$OfferID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewofferdetails.php");
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
 