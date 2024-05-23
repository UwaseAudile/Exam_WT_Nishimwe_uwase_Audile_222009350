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
    <title>offerdetails Management</title>
    <Salary rel="stylesheet" type="text/css" href="style3.css">
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
    <h2>offerdetails Management</h2>
    <!-- Display the table -->
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>OfferID</th>
            <th>CandidateID</th>
            <th>JobID</th>
            <th>OfferStatus</th>
            <th>Salary</th>
            <th>Benefits</th>
            <th>NegotiationHistory</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the offerdetails table
        $sql = "SELECT * FROM offerdetails";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["OfferID"] . "</td>"; //OfferID
                echo "<td>" . $row["CandidateID"] . "</td>"; //CandidateID
                echo "<td>" . $row["JobID"] . "</td>"; // JobID 
                echo "<td>" . $row["OfferStatus"] . "</td>"; // OfferStatus
                echo "<td>" . $row["Salary"] . "</td>"; // Salary
                echo "<td>" . $row["Benefits"] . "</td>"; // Benefits
                echo "<td>" . $row["NegotiationHistory"] . "</td>"; // NegotiationHistory
                
                echo "<td>";
                // Edit and delete actions
              echo "<a href='updateofferdetails.html?id=" . $row["OfferID"] .  "'onclick='return confirm(\"Are you sure you want to update this offerdetails?\")'><button class='button update-button'>Edit</button></a>";
                // Delete action
                echo "<a href='deleteofferdetails.html?id=" . $row["OfferID"] . "'onclick='return confirm(\"Are you sure you want to delete this offerdetails?\")'><button class='button delete-button'>Delete</button></a>";
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
