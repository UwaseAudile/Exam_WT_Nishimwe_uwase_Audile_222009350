<?php
/*


*/
require_once 'db_connection.php'; // Include the config.php file for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE users SET $column = ? WHERE Email = ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $email);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('User data updated successfully!'); window.location.href = 'Dashboarduser.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'Dashboarduser.html';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update user data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
