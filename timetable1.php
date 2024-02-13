<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Timetable</title>
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
        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1 class="h1">Exam Timetable</h1>
<?php

include "connection.php"; // Include your database connection file

$sql = "SELECT * FROM exam ORDER BY exam_Type, date, start_time";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $currentExamType = '';

    while ($row = $result->fetch_assoc()) {
        $examType = $row["exam_Type"];

        // Display exam type as a header when it changes
        if ($currentExamType !== $examType) {
            echo "<h2>$examType Exam</h2>";
            echo "<table>";
            echo "<tr><th>Course ID</th><th>Course Title</th><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
            $currentExamType = $examType;
        }

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
