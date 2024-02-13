<?php
include "connection.php";
$deptIdToDelete = $_GET['deptIdToDelete'];

// Define the SQL statement to delete data
$sql = "DELETE FROM department WHERE dept_id = $deptIdToDelete";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Department record deleted successfully";
} else {
    echo "Error deleting department record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>