<?php
include "connection.php";
$userId = $_POST['userId'] ?? '';
$password = $_POST['password'] ?? '';

// Hash the password (for security)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Define the SQL statement to insert data
$sql = "INSERT INTO admin (userid, password) 
        VALUES ('$userId', '$hashedPassword')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Admin record inserted successfully";
} else {
    echo "Error inserting admin record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>