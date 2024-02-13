<?
include "connection.php";
$usn = $_GET["usn"];  
$firstName = $_GET["firstname"];  
$middleName =$_GET["middlename"];  
$lastName =$_GET["lastname"];
$phoneNumber = $_GET["phone"];  
$deptId = $_GET["dept"];

$sql = "UPDATE student SET 
        first_name = '$FirstName',
        middle_name = '$MiddleName',
        last_name = '$LastName',
        phone_number = $PhoneNumber,
        dept_id = $deptId
        WHERE USN = '$usn'";

if ($conn->query($sql) === TRUE) 
{
    echo "Records updated: ".$usn."-".$firstName."-".$middleName."-".$lastName."-".$phoneNumber."-".$deptId;
}
else 
{
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();   
header("refresh:5;URL=index.html");
?>   