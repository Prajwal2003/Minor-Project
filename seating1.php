<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom Seating Arrangement</title>
    <style>
        /* Your existing CSS styles remain unchanged */

        select {
            margin: 20px;
        }
    </style>
</head>
<body>
    <?php
    include "connection.php"; // Include your database connection file

    // Initialize the current student index
    $currentStudentIndex = 0;

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedCourse = $_POST["course"];
        $selectedExamType = $_POST["examType"];

        // Get the list of classrooms
        $classroomsQuery = "SELECT class_num, capacity FROM classroom";
        $classroomsResult = $conn->query($classroomsQuery);

        if ($classroomsResult->num_rows > 0) {
            // Retrieve all students for the selected course and exam type
            $studentsQuery = "SELECT stu.USN
                              FROM student stu
                              JOIN stu_enroll en ON stu.USN = en.USN
                              JOIN exam e ON en.course_id = e.course_id
                              WHERE e.course_id = '$selectedCourse' AND e.exam_Type = '$selectedExamType'";
            $studentsResult = $conn->query($studentsQuery);
            $students = [];

            while ($student = $studentsResult->fetch_assoc()) {
                $students[] = $student['USN'];
            }

            // Loop through each classroom
            echo "<h2>Classroom Seating Arrangement</h2>";
            while ($classroom = $classroomsResult->fetch_assoc()) {
                $classNum = $classroom['class_num'];
                $capacity = $classroom['capacity'];

                // Create a table for each class
                echo "<h3>Classroom $classNum</h3>";
                echo "<table>";
                echo "<tr><th>Seat Number</th><th>Student USN</th></tr>";

                // Assign students to seats based on exam type
                if ($selectedExamType === 'IA') {
                    // Sequential assignment grouped by department
                    assignSequentialSeatsByDept($students, $capacity);
                } elseif ($selectedExamType === 'Semester End') {
                    // Alternating assignment between departments
                    assignAlternatingSeatsByDept($students, $capacity);
                }

                echo "</table>";
            }
        } else {
            echo "No classrooms found.";
        }
    } else {
        // Display the form for selecting course and exam type
        echo "<form method='post'>";
        echo "<label for='course'>Select Course:</label>";
        echo "<select name='course'>";
        
        // Fetch distinct course IDs from the exam table
        $distinctCoursesQuery = "SELECT DISTINCT course_id FROM exam";
        $distinctCoursesResult = $conn->query($distinctCoursesQuery);

        while ($course = $distinctCoursesResult->fetch_assoc()) {
            echo "<option value='" . $course['course_id'] . "'>" . $course['course_id'] . "</option>";
        }

        echo "</select>";

        echo "<label for='examType'>Select Exam Type:</label>";
        echo "<select name='examType'>";
        echo "<option value='IA'>IA</option>";
        echo "<option value='Semester End'>Semester End</option>";
        echo "</select>";

        echo "<input type='submit' value='Generate Seating Arrangement'>";
        echo "</form>";
    }

    // Close the database connection
    $conn->close();

    // Function to group students by department
    function groupStudentsByDept($students, $conn) {
        $studentsGroupedByDept = [];

        // Fetch distinct department IDs from the student table
        $distinctDeptsQuery = "SELECT DISTINCT dept_id FROM student";
        $distinctDeptsResult = $conn->query($distinctDeptsQuery);

        while ($dept = $distinctDeptsResult->fetch_assoc()) {
            $deptID = $dept['dept_id'];
            $studentsGroupedByDept[$deptID] = [];
        }

        // Group students by department
        foreach ($students as $student) {
            $stuDeptQuery = "SELECT dept_id FROM student WHERE USN = '$student'";
            $stuDeptResult = $conn->query($stuDeptQuery);
            $stuDept = $stuDeptResult->fetch_assoc()['dept_id'];

            $studentsGroupedByDept[$stuDept][] = $student;
        }

        return $studentsGroupedByDept;
    }

    // Function to assign seats sequentially grouped by department
    function assignSequentialSeatsByDept($students, $capacity) {
        global $currentStudentIndex;
        $seatNumber = 1; // Initialize seat number for each class

        for ($i = 0; $i < $capacity; $i++) {
            // Get the next student cyclically
            $currentStudent = $students[$currentStudentIndex];
            $currentStudentIndex = ($currentStudentIndex + 1) % count($students);

            // Display the assignment in the table
            echo "<tr><td>$seatNumber</td><td>$currentStudent</td></tr>";

            // Reset seat number for the next class
            if (($i + 1) % $capacity == 0) {
                $seatNumber = 1;
            } else {
                $seatNumber++;
            }
        }
    }

    // Function to assign seats alternating between departments
    function assignAlternatingSeatsByDept($students, $capacity) {
        global $currentStudentIndex;
        $seatNumber = 1; // Initialize seat number for each class

        for ($i = 0; $i < $capacity; $i++) {
            // Get the next student cyclically
            $currentStudent = $students[$currentStudentIndex];
            $currentStudentIndex = ($currentStudentIndex + 1) % count($students);

            // Display the assignment in the table
            echo "<tr><td>$seatNumber</td><td>$currentStudent</td></tr>";

            // Reset seat number for the next class
            if (($i + 1) % $capacity == 0) {
                $seatNumber = 1;
            } else {
                $seatNumber++;
            }
        }
    }
    ?>
</body>
</html>
