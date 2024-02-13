<?php
include "connection.php";
$eCourseIdToUpdate = $_GET['eCourseIdToUpdate'] ?? '';
$newECourseTitle = $_GET['newECourseTitle'] ?? '';

// Define the SQL statement to update data
$sql = "UPDATE elective_course 
        SET ecourse_title = '$newECourseTitle'
        WHERE ecourse_id = '$eCourseIdToUpdate'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Elective course record updated successfully";
} else {
    echo "Error updating elective course record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>