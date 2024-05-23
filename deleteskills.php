<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['SkillID'])) {
    // Sanitize the input
    $skillsID = $conn->real_escape_string($_POST['SkillID']);

    // Delete query
    $sql = "DELETE FROM skills WHERE SkillID='$skillsID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewskills.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or skillsID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

