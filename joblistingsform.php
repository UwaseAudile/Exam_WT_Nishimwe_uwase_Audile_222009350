<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $Title = mysqli_real_escape_string($conn, $_POST['Title']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $Requirements = mysqli_real_escape_string($conn, $_POST['Requirements']);
    $Location = mysqli_real_escape_string($conn, $_POST['Location']);
    $CompanyID = mysqli_real_escape_string($conn, $_POST['CompanyID']);
   
    // Attempt to insert the data into the database
    $sql = "INSERT INTO joblistings (Title, Description, Requirements,Location,CompanyID) 
            VALUES ('$Title', '$Description', '$Requirements','$Location','$CompanyID')";

    if (mysqli_query($conn, $sql)) {
        echo "joblistings record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
a