<?php
// Database configuration
$servername = "localhost"; 
$username = "audile"; 
$password = "222009350"; 
$database = "recruitmentplatform"; // 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
