<?php
include "connection.php";
$examtodelete = $_GET['courseid'];

// Define the SQL statement to delete data
$sql = "DELETE FROM exam WHERE course_id = '$examtodelete'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Seat record deleted successfully";
} else {
    echo "Error deleting exam record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>