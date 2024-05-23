<?php
/*
    */
session_start();
// Include database connection file
require_once "db_connection.php";

// Check if email is set in session
if (!isset($_SESSION["email"])) {
    // Redirect user to login page or handle the error
    header("Location: login.php");
    exit();
}



$email = $_SESSION["email"];
$sql = "SELECT  admin_id,username,password,email,full_name  FROM admin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>USER DETAILS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- icon -->
    <style>
   body {
    font-family: Arial, sans-serif;
    background-color: #1f3a8e;
    margin: 0;
    padding: 0;
}
   
        .container1 {
    max-width: 600px;
    margin-bottom:30px;
    margin: 7px auto;
    background-color: rgba(144, 156, 214, 0.5);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}
.container1 p strong{
    color:rgb(255, 230, 0);
}
.container1 p{
    color:black;
}

        h1 {
            font-size: 36px;
            color: #000080;
            text-align: center;
            margin-bottom: 20px;
        }

   
    </style>
</head>
<body>

  
    <div class="container1">
    <h1>User Details</h1>
    <p><strong>adminID        :    </strong> <?php echo $userData["admin_id"]; ?></p>
    <p><strong>username         :    </strong> <?php echo $userData["username"]; ?></p>
    <p><strong>password  :    </strong> <?php echo $userData["password"]; ?></p>
    <p><strong>email         :    </strong> <?php echo $userData["email"]; ?></p>
    <p><strong>full_name      :    </strong> <?php echo $userData["full_name"]; ?></p>
    
    
    
</body>

</html>
