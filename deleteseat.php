<?php
include "connection.php";
$seatNumToDelete = $_GET['seatNumToDelete'];

// Define the SQL statement to delete data
$sql = "DELETE FROM seat WHERE seat_num = '$seatNumToDelete'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Seat record deleted successfully";
} else {
    echo "Error deleting seat record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>