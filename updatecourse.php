<?php
     include "connection.php";
     
     $courseid =  $_GET['course_id'];
     $course_name =  $_GET['course_name'];

     // $sql = "update course set course_title='$course_name'  where course_id='$course_id'";
     $sql = "UPDATE course SET course_title = '$course_name' WHERE course_id = '$courseid'";

     if ($conn->query($sql) === TRUE) 
     {
	     echo "Records updated: ".$course_id."-".$course_name;
     }
     else 
     {
	     echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();
     header("refresh:5;URL=index.html");
?>