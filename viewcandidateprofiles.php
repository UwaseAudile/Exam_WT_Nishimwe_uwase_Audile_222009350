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
    <title>candidateprofiles Management</title>
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
    <h2>candidateprofiles Management</h2>
    <!-- Display the table -->
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>CandidateID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Resume</th>
            <th>Skills</th>
            <th>Education</th>
            <th>Experience</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the candidateprofiles table
        $sql = "SELECT * FROM candidateprofiles";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["CandidateID"] . "</td>"; //CandidateID
                echo "<td>" . $row["Name"] . "</td>"; // Name
                echo "<td>" . $row["Email"] . "</td>"; // Email
                echo "<td>" . $row["Phone"] . "</td>"; // Phone
                 echo "<td>" . $row["Resume"] . "</td>"; // Resume
                  echo "<td>" . $row["Skills"] . "</td>"; // Skills
                   echo "<td>" . $row["Education"] . "</td>"; //Education
                    echo "<td>" . $row["Experience"] . "</td>"; // Experience
                
                echo "<td>";
                // Edit and delete actions
              echo "<a href='updatecandidateprofiles.html?id=" . $row["CandidateID"] .  "'onclick='return confirm(\"Are you sure you want to update this candidateprofiles?\")'><button class='button update-button'>Edit</button></a>";
                // Delete action
                echo "<a href='deletecandidateprofiles.html?id=" . $row["CandidateID"] . "'onclick='return confirm(\"Are you sure you want to delete this candidateprofiles?\")'><button class='button delete-button'>Delete</button></a>";
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
