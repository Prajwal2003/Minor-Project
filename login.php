<?php
include "connection.php"; // Include your database connection file

// Retrieve the username and password from the form
$username = $_GET['us'];
$password = $_GET['password'];

// SQL query to check if the username and password match
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Authentication successful, redirect to index.html
    header("Location: index.html");
} else {
    // Authentication failed, redirect to a failure page or display an error message
    header("Location: login.html");
}

// Close the database connection
$conn->close();
?>
