<?
include "connection.php";
$eCourseIdToDelete = $_GET['eCourseIdToDelete'];

// Define the SQL statement to delete data
$sql = "DELETE FROM elective_course WHERE e_courseid = '$eCourseIdToDelete'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Elective course record deleted successfully";
} else {
    echo "Error deleting elective course record: " . $conn->error;
}

// Close the database connection
$conn->close();
header("refresh:5;URL=index.html");
?>