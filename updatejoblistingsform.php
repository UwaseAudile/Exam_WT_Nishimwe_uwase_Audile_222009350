<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $JobID = $_POST['JobID'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Requirements = $_POST['Requirements'];
    $Location = $_POST['Location'];
    $CompanyID = $_POST['CompanyID'];
    // Update query
    $sql = "UPDATE joblistings SET Title='$Title', Description='$Description', Requirements='$Requirements',Location='$Location',CompanyID='$CompanyID' WHERE JobID='$JobID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewjoblistings.php");
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
 