<?php
     include "connection.php";
     // Taking all 5 values from the form database
     $room_no =  $_GET['classnum'];
     $capacity =  $_GET['capacity'];

     $sql = "INSERT INTO classroom (class_num, capacity) VALUES ($room_no, $capacity)";
     if(mysqli_query($conn, $sql)){
         echo "<h3>Classroom data inserted in  database successfully.</h3>"; 

         echo nl2br("\n$room_no\n $capacity\n ");
         
     } else{
         echo "ERROR $sql. "
             . mysqli_error($conn);
     }

     mysqli_close($conn);
     header("refresh:5;URL=index.html");
?>


        

