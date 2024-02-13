<?php
     include "connection.php";
     
     $room_no =  $_GET['classnum'];
     $capacity =  $_GET['capacity'];
    
     $sql = "UPDATE classroom SET capacity = $newCapacity WHERE class_num = $room_no";
     if ($conn->query($sql) === TRUE) 
     {
	     echo "Records updated: ".$room_no."-".$capacity;
     }
     else 
     {
	     echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();
     header("refresh:5;URL=index.html");
?>