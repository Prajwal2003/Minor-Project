<?php
include "connection.php";
$seatNum = $_GET['seatNum'] ?? '';
$status = $_GET['status'] ?? '';

// Define the SQL statement to insert data
$sql = "INSERT INTO seat (seat_num, status) 
        VALUES ($seatNum, '$status')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Seat record inserted successfully";
} else {
    echo "Error inserting seat record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>