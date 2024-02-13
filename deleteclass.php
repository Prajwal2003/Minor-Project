<?php
include "connection.php";

$room_no = $_GET['room_no'];

$sql = "DELETE FROM classroom WHERE class_num = $room_no";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("refresh:5;URL=index.html");
?>
