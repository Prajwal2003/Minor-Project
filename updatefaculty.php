<?php
     include "connection.php";
     
     $empId = $_GET["empid"];  
     $firstName = $_GET["firstname"];  
     $middleName =$_GET["middlename"];  
     $lastName =$_GET["lastname"];
     $phoneNumber = $_GET["phone"];  
     $courseId = $_GET["courseid"];
     $deptId = $_GET["dept"];
     $classNumber = $_GET["classnum"]; 

     $sql = "UPDATE instructor SET 
     first_name = '$newFirstName',
     middle_name = '$newMiddleName',
     last_name = '$newLastName',
     phone_number = '$newPhoneNumber',
     course_id = '$newCourseId',
     dept_id = $newDeptId,
     class_num = $newClassNumber
     WHERE emp_id = '$empId'";

     if ($conn->query($sql) === TRUE) 
     {
	     echo "Records updated: ".$empId."-".$firstName."-".$middleName."-".$lastName."-".$phoneNumber."-". $courseId."-". $deptId."-". $classNumber;
     }
     else 
     {
	     echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();
     header("refresh:5;URL=index.html");
?>