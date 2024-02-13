<?php
include "connection.php";
$courseId = $_GET['courseid'];
$courseTitle = $_GET['coursetitle'];
$date = $_GET['date'];
$startTime = $_GET['starttime'];
$endTime = $_GET['endtime'];

// Define the SQL statement to update data
$sql = "UPDATE exam 
        SET date = '$newDate', start_time = '$newStartTime', end_time = '$newEndTime'
        WHERE course_id = '$courseId'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Exam record updated successfully";
} else {
    echo "Error updating exam record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>