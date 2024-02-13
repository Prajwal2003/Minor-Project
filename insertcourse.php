<?php
     include "connection.php";
     // Taking all 5 values from the form database
     $course_Id =  $_GET['course_id'];
     $course_name =  $_GET['course_name'];
     
      
     // Performing insert query execution
     // here our table name is course
    //  $sql = "INSERT INTO course VALUES ('$course_id','$course_name')";
     $sql = "INSERT INTO course (course_id, course_title) VALUES ('$course_Id', '$course_name')";
      
     if(mysqli_query($conn, $sql)){
         echo "<h3>Course data inserted in  database successfully.</h3>"; 

         echo nl2br("\n$course_Id\n $course_name");
     } else{
         echo "ERROR $sql. "
             . mysqli_error($conn);
     }
      
     // Close connection
     mysqli_close($conn);
?>


        

