<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ApplicationID'])) {
    // Sanitize the input
    $ApplicationID = $conn->real_escape_string($_POST['ApplicationID']);

    // Delete query
    $sql = "DELETE FROM applications WHERE ApplicationID='$ApplicationID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewapplications.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or ApplicationID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

