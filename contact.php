<?php
// Include database connection file
require_once "db_connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $Name = $conn->real_escape_string(trim($_POST['Name']));
    $Email = $conn->real_escape_string(trim($_POST['Email']));
    $Message = $conn->real_escape_string(trim($_POST['Message']));

    // Insert query
    $sql = "INSERT INTO contact_messages (Name, Email, Message) VALUES ('$Name', '$Email', '$Message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, show an error message
    echo "Form submission method not allowed.";
}
?>
