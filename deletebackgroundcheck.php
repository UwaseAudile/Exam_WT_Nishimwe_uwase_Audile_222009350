<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CheckID'])) {
    // Sanitize the input
    $backgroundcheckID = $conn->real_escape_string($_POST['CheckID']);

    // Delete query
    $sql = "DELETE FROM backgroundcheck WHERE CheckID='$backgroundcheckID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewbackgroundcheck.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or backgroundcheckID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

