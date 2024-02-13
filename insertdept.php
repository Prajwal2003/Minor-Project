<?php
include "connection.php";
$deptId = $_GET['deptId'];
$deptName = $_GET['deptName'];
$location = $_GET['location'];

// Define the SQL statement to insert data
$sql = "INSERT INTO department (dept_id, dept_name, location) 
        VALUES ($deptId, '$deptName', '$location')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Department record inserted successfully";
} else {
    echo "Error inserting department record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>
