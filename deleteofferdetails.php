<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['OfferID'])) {
    // Sanitize the input
    $OfferID = $conn->real_escape_string($_POST['OfferID']);

    // Delete query
    $sql = "DELETE FROM offerdetails WHERE OfferID='$OfferID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewofferdetails.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or OfferID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

a