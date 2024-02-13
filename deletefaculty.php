<?php
     include "connection.php";
     // Taking all 5 values from the form database
     $id =  $_GET['id'];
    
     $sql = "DELETE FROM instructor WHERE emp_id=$id";

     if ($conn->query($sql) === TRUE) {
         echo "Record deleted successfully";
     } else {
              echo "Error deleting record: " . $conn->error;
     }

     $conn->close();
     header("refresh:5;URL=index.html");
?>