<?php
include "connection.php";
$seatNumToUpdate = $_GET['seatNumToUpdate'];
$newStatus = $_GET['newStatus'];

// Define the SQL statement to update data
$sql = "UPDATE seat 
        SET status = '$newStatus'
        WHERE seat_num = $seatNumToUpdate";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Seat record updated successfully";
} else {
    echo "Error updating seat record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>