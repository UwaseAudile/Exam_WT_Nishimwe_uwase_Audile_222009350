<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $Resume = mysqli_real_escape_string($conn, $_POST['Resume']);
    $Skills = mysqli_real_escape_string($conn, $_POST['Skills']);
    $Education = mysqli_real_escape_string($conn, $_POST['Education']);
    $Experience = mysqli_real_escape_string($conn, $_POST['Experience']);


    // Attempt to insert the data into the database
    $sql = "INSERT INTO candidateprofiles (Name, Email, Phone,Resume,Skills,Education,Experience) 
            VALUES ('$Name', '$Email', '$Phone','$Resume','$Skills','$Education','$Experience')";

    if (mysqli_query($conn, $sql)) {
        echo "candidateprofiles record added successfully.";
        header("Location: applicationsForm.html");

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
