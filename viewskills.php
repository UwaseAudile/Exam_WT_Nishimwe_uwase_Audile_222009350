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
    <title>skills Management</title>
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
    <h2>skills Management</h2>
    <!-- Display the table -->
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>SkillID</th>
            <th>SkillName</th>
            <th>Description</th>
            <th>ProficiencyLevel</th>
            <th>Certifications</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the skills table
        $sql = "SELECT * FROM skills";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["SkillID"] . "</td>"; //SkillID
                echo "<td>" . $row["SkillName"] . "</td>"; //     SkillName
                echo "<td>" . $row["Description"] . "</td>"; // Description 
                echo "<td>" . $row["ProficiencyLevel"] . "</td>"; // ProficiencyLevel
                echo "<td>" . $row["Certifications"] . "</td>"; // Certifications
                
                echo "<td>";
                // Edit and delete actions
              echo "<a href='updateskills.html?id=" . $row["SkillID"] .  "'onclick='return confirm(\"Are you sure you want to update this skills?\")'><button class='button update-button'>Edit</button></a>";
                // Delete action
                echo "<a href='deleteskills.html?id=" . $row["SkillID"] . "'onclick='return confirm(\"Are you sure you want to delete this skills?\")'><button class='button delete-button'>Delete</button></a>";
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
