<?php
include "connection.php";
$courseId = $_GET['courseid'];
$courseTitle = $_GET['coursetitle'];
$date = $_GET['date'];
$startTime = $_GET['starttime'];
$endTime = $_GET['endtime'];

// Define the SQL statement to insert data
$sql = "INSERT INTO exam (course_id, course_title, date, start_time, end_time) 
        VALUES ('$courseId', '$courseTitle', '$date', '$startTime', '$endTime')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>