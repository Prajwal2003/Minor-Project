<?php
     include "connection.php";
     // Taking all 5 values from the form database
     $empId = $_GET["empid"];  
     $firstName = $_GET["firstname"];  
     $middleName =$_GET["middlename"];  
     $lastName =$_GET["lastname"];
     $phoneNumber = $_GET["phone"];  
     $courseId = $_GET["courseid"];
     $deptId = $_GET["dept"];
     $classNumber = $_GET["classnum"]; 
      
    $sql = "INSERT INTO instructor (emp_id, first_name, middle_name, last_name, phone_number, course_id, dept_id, class_num) 
        VALUES ('$empId', '$firstName', '$middleName', '$lastName', '$phoneNumber', '$courseId', '$deptId', '$classNumber')";
      
     if(mysqli_query($conn, $sql)){
         echo "<h3>Faculty data inserted in  database successfully.</h3>"; 

         echo nl2br("\n$empId\n$firstname\n$middlename\n$lastname\n "
             . "$phonenumber\n $courseId\n $deptId\n$classNumber");
     } else{
         echo "ERROR $sql. "
             . mysqli_error($conn);
     }
      
     // Close connection
     mysqli_close($conn);
?>


        

