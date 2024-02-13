<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: black;
            color: white;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        th{
            color: grey;
        }
        th {
            background-color: #f2f2f2;
        }
        .h1{
            position: absolute;
            top:70px;
            font-size: 60px;
        }
    </style>
</head>
<body>
<h1 class="h1">TimeTable</h1>
<?php

include "conn.php";

$sql = "SELECT * FROM exam";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Course ID</th><th>Course Title</th><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["course_title"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["start_time"] . "</td>";
        echo "<td>" . $row["end_time"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No exam details available.";
}

$conn->close();
?>

</body>
</html>
