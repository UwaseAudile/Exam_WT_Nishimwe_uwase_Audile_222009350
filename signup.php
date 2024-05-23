<?php
// Include the database connection file
require_once "db_connection.php";

// Process sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];

    // SQL query to insert data into the user table
    $sql = "INSERT INTO admin (username,password,email,full_name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssss", $username, $password, $email, $full_name);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Success message
            echo "Sign-up successful. Redirecting...";

            // Redirect to a success page or any other page after successful sign-up
            header("Location: login.html");
            exit();
        } else {
            // Error message
            echo "Error: Unable to execute SQL statement<br>";
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Error message if the statement preparation failed
        echo "Error: Unable to prepare SQL statement<br>";
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
