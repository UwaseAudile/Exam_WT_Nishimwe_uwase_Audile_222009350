<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $SkillID = $_POST['SkillID'];
    $SkillNamea = $_POST['SkillNamea'];
    $Description = $_POST['Description'];
    $ProficiencyLevel = $_POST['ProficiencyLevel'];
    $Certifications = $_POST['Certifications'];
    

    // Update query
    $sql = "UPDATE skills SET SkillNamea='$SkillNamea',Description='$Description', ProficiencyLevel='$ProficiencyLevel',Certifications='$Certifications' WHERE SkillID='$SkillID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewskills.php");
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
 