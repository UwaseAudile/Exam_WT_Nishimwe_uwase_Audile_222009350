<?php
// Include database connection file
require_once "db_connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and escape inputs to prevent SQL injection
    $CandidateID = $conn->real_escape_string($_POST['CandidateID']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $Phone = $conn->real_escape_string($_POST['Phone']);
    $Resume = $conn->real_escape_string($_POST['Resume']);
    $Skills = $conn->real_escape_string($_POST['Skills']);
    $Education = $conn->real_escape_string($_POST['Education']);
    $Experience = $conn->real_escape_string($_POST['Experience']);

    // Update query
    $sql = "UPDATE candidateprofiles SET 
            Name='$Name', 
            Email='$Email', 
            Phone='$Phone', 
            Resume='$Resume', 
            Skills='$Skills', 
            Education='$Education', 
            Experience='$Experience' 
            WHERE CandidateID='$CandidateID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: viewcandidateprofiles.php");
        exit; // Ensure the script stops after the redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
