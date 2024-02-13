<?php
     include "connection.php";
     // Taking all 5 values from the form database
     $usn =  $_GET['usn'];
    
     $sql = "DELETE FROM student WHERE USN=$usn";

     if ($conn->query($sql) === TRUE) {
         echo "Record deleted successfully";
     } else {
              echo "Error deleting record: " . $conn->error;
     }

     $conn->close();
     header("refresh:5;URL=index.html");
?>