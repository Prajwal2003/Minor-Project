<?php
     include "connection.php";

     $usn = $_GET["usn"];  
     $firstName = $_GET["firstname"];  
     $middleName =$_GET["middlename"];  
     $lastName =$_GET["lastname"];
     $phoneNumber = $_GET["phone"]; 
     $deptId = $_GET["dept"];
      
    $sql = "INSERT INTO student (USN, first_name, middle_name, last_name, phone_number, dept_id) 
        VALUES ('$usn', '$firstName', '$middleName', '$lastName', '$phoneNumber', '$deptId')";
      
     if(mysqli_query($conn, $sql)){
         echo "<h3>Student data inserted in  database successfully.</h3>"; 

         echo nl2br("\n$usn\n $firstname\n$middlename\n$lastname\n "
             . "$phoneNumber\n $deptId");
     } else{
         echo "ERROR $sql. "
             . mysqli_error($conn);
     }
      
     // Close connection
     mysqli_close($conn);
     header("refresh:5;URL=index.html");
?>


        

