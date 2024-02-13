<?php
     include "connection.php";
     $eCourseId = $_GET['eCourseId'] ?? '';
$eCourseTitle = $_GET['eCourseTitle'] ?? '';

// Define the SQL statement to insert data
$sql = "INSERT INTO elective_course (ecourse_id, ecourse_title) 
        VALUES ('$eCourseId', '$eCourseTitle')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Elective course record inserted successfully";
} else {
    echo "Error inserting elective course record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>