<?php
// Include the database connection file
require_once "db_connection.php";

// Display any alert JobIDs
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interviews Management</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <style>
       table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>interviews Management</h2>
    <!-- Display the table -->
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>InterviewID</th>
            <th>CandidateID</th>
            <th>JobID</th>
            <th>InterviewerID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the interviews table
        $sql = "SELECT * FROM interviews";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["InterviewID"] . "</td>"; //InterviewID 
                echo "<td>" . $row["CandidateID"] . "</td>"; //     CandidateID
                echo "<td>" . $row["JobID"] . "</td>"; // JobID
                echo "<td>" . $row["InterviewerID"] . "</td>"; //InterviewerID
                echo "<td>" . $row["Date"] . "</td>"; // Date
                echo "<td>" . $row["Time"] . "</td>"; // Time
                echo "<td>" . $row["Location"] . "</td>"; //Location
                
                echo "<td>";
                // Edit and delete actions
              echo "<a href='updateinterviews.html?id=" . $row["InterviewID"] .  "'onclick='return confirm(\"Are you sure you want to update this interviews?\")'><button class='button update-button'>Edit</button></a>";
                // Delete action
                echo "<a href='deleteinterviews.html?id=" . $row["InterviewID"] . "'onclick='return confirm(\"Are you sure you want to delete this interviews?\")'><button class='button delete-button'>Delete</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
