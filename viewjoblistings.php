<?php
// Include the database connection file
require_once "db_connection.php";

// Display any alert messages
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
    <title>joblistings Management</title>
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
    <h2>joblistings Management</h2>
    <!-- Display the table -->
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>JobID</th>
            <th>Title</th>
            <th>Description </th>
            <th>Requirements</th>
            <th>Location</th>
            <th>CompanyID</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the joblistings table
        $sql = "SELECT * FROM joblistings";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["JobID"] . "</td>"; //JobID
                echo "<td>" . $row["Title"] . "</td>"; //Title
                echo "<td>" . $row["Description"] . "</td>"; // Description 
                echo "<td>" . $row["Requirements"] . "</td>"; // Requirements
                echo "<td>" . $row["Location"] . "</td>"; // Location
                echo "<td>" . $row["CompanyID"] . "</td>"; // CompanyID
                echo "<td>";
                // Edit and delete actions
              echo "<a href='updatejoblistings.html?id=" . $row["JobID"] .  "'onclick='return confirm(\"Are you sure you want to upDate this joblistings?\")'><button class='button upDate-button'>Edit</button></a>";
                // Delete action
                echo "<a href='deletejoblistings.html?id=" . $row["JobID"] . "'onclick='return confirm(\"Are you sure you want to delete this joblistings?\")'><button class='button delete-button'>Delete</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
