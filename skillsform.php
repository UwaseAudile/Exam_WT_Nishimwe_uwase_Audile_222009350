<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $SkillName = mysqli_real_escape_string($conn, $_POST['SkillName']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $ProficiencyLevel = mysqli_real_escape_string($conn, $_POST['ProficiencyLevel']);
    $Certifications = mysqli_real_escape_string($conn, $_POST['Certifications']);
    

    // Attempt to insert the data into the database
    $sql = "INSERT INTO skills (SkillName,Description, ProficiencyLevel, Certifications) 
            VALUES ('$SkillName','$Description', '$ProficiencyLevel', '$Certifications')";

    if (mysqli_query($conn, $sql)) {
        echo "skills record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
