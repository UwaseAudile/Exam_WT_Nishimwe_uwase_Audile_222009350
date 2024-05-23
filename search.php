<?php
require_once "db_connection.php";

if (isset($_GET['query'])) {
    $searchTerm = $conn->real_escape_string($_GET['query']);
    $output = "";

    $queries = [
        'applications' => "SELECT ApplicationID, CandidateID, JobID, Status, DateApplied FROM applications WHERE ApplicationID LIKE '%$searchTerm%'",
        'candidateprofiles' => "SELECT CandidateID, Name, Email, Phone,Resume,Skills,Education,Experience FROM  candidateprofiles WHERE  CandidateID LIKE '%$searchTerm%'",
        'users' => "SELECT UserID ,Username, Email, Password, Role FROM users WHERE UserID LIKE '%$searchTerm%'",
        'assessmentresults' => "SELECT AssessmentID, CandidateID, AssessmentType, Score,Date,Feedback FROM assessmentresults WHERE AssessmentID LIKE '%$searchTerm%'",
        'backgroundcheck' => "SELECT CheckID,CandidateID, TypeOfCheck, Status,Date FROM backgroundcheck WHERE CheckID LIKE '%$searchTerm%'",
        'interviews' => "SELECT InterviewID, CandidateID ,JobID,InterviewerID,Date,Time,Location FROM interviews WHERE InterviewID LIKE '%$searchTerm%'",
        'feedback' => "SELECT FeedbackID, InterviewID, FeedbackType,  Comments,InterviewerName,Date FROM feedback WHERE FeedbackID LIKE '%$searchTerm%'",
        'joblistings' => "SELECT JobID, Title, Description,Requirements,Location,CompanyID FROM joblistings WHERE JobID LIKE '%$searchTerm%'",
        'offerdetails' => "SELECT OfferID, CandidateID, JobID, OfferStatus, Salary,Benefits,NegotiationHistory FROM offerdetails WHERE OfferID LIKE '%$searchTerm%'",
        'admin' => "SELECT admin_id, username,password,email,full_name FROM admin WHERE admin_id LIKE '%$searchTerm%'",
        'skills' => "SELECT SkillID, SkillName,Description, ProficiencyLevel, Certifications FROM skills WHERE SkillID LIKE '%$searchTerm%'"
    ];

 $output .= "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<table border='1'>";
                // Output table header
                $output .= "<tr>";
                $row = $result->fetch_assoc(); // Fetch first row to get column names
                foreach ($row as $key => $value) {
                    $output .= "<th>$key</th>";
                }
                $output .= "</tr>";
                
                // Output table data
                do {
                    $output .= "<tr>";
                    foreach ($row as $value) {
                        $output .= "<td>$value</td>";
                    }
                    $output .= "</tr>";
                } while ($row = $result->fetch_assoc());
                
                $output .= "</table>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $conn->error . "</p>";
        }
    }

    echo $output;

    $conn->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>

