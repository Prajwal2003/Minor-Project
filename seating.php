<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom Seating Arrangement</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: whitesmoke;
        }

        table {
            width: 40%;
            margin: 72px;
            /* float: left; */
            /* border-collapse: collapse; */
        }

        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #555;
        }


.topbar {
    height: 40px;
    width: 720px;
    background-color: black;
    margin-top: -8px;
    margin-left: -8px;
    font-size: 20px;
}

.logobar {
    margin-top: 7px;
    background-color: white;
}

div.logobar img {
    position: relative;
    left: 50px;
}

div.logobar a {
    position: relative;
    left: 530px;
    top: -40px;
    text-decoration: none;
    color: black;
    padding-right: 40px;
    font-weight: 500;
    font-size: 15px;
}

    </style>
</head>
<body>
    <div class="topbar">
        
        </div>
    
        <div class="logobar">
            <img src="new-logo.png" height="90px">
            <a href="database.html">Database</a>
            <a href="timetable.php">Timetable</a>
            <a href="seating.php">Seating Matrix</a>
            <a href="contact.html">Contact Us</a>
        </div>
    <?php
    include "connection.php";
    $classroomsQuery = "SELECT class_num, capacity FROM classroom";
    $classroomsResult = $conn->query($classroomsQuery);

    if ($classroomsResult->num_rows > 0) {
        $studentsQuery = "SELECT USN FROM student";
        $studentsResult = $conn->query($studentsQuery);
        $students = [];

        while ($student = $studentsResult->fetch_assoc()) {
            $students[] = $student['USN'];
        }

        while ($classroom = $classroomsResult->fetch_assoc()) {
            $classNum = $classroom['class_num'];
            $capacity = $classroom['capacity'];

            echo "<h2>Classroom $classNum</h2>";
            echo "<table>";
            echo "<tr><th>Seat Number</th><th>Student USN</th></tr>";

            for ($seatNumber = 1; $seatNumber <= $capacity; $seatNumber++) {
                $currentStudent = array_shift($students);
                if (!$currentStudent) {
                    break;
                }

                echo "<tr><td>$seatNumber</td><td>$currentStudent</td></tr>";

                if (empty($students)) {
                    $studentsQuery = "SELECT USN FROM student";
                    $studentsResult = $conn->query($studentsQuery);

                    while ($student = $studentsResult->fetch_assoc()) {
                        $students[] = $student['USN'];
                    }
                }
            }

            echo "</table>";
        }
    } else {
        echo "No classrooms found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
