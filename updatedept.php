<?php
include "connection.php";
$deptIdToUpdate = $_GET['deptIdToUpdate'];
$newDeptName = $_GET['newDeptName'];
$newLocation = $_GET['newLocation'];

// Define the SQL statement to update data
$sql = "UPDATE department 
        SET dept_name = '$newDeptName', location = '$newLocation'
        WHERE dept_id = '$deptIdToUpdate'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Department record updated successfully";
} else {
    echo "Error updating department record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>