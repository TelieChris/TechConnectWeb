<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techconnectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch courses
$sql = "SELECT * FROM courses";
$courses = $conn->query($sql);

// Fetch assignments
$sql = "SELECT * FROM assignments";
$assignments = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Timetable for Semester One </h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Assignment Title</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($assignments->num_rows > 0) {
                    while($row = $assignments->fetch_assoc()) {
                        // Fetch course name for each assignment
                        $course_id = $row['course_id'];
                        $course_name = "";
                        $course_code = "";
                        
                        if ($courses->num_rows > 0) {
                            while($course = $courses->fetch_assoc()) {
                                if ($course['course_id'] == $course_id) {
                                    $course_name = $course['course_name'];
                                    $course_code = $course['course_code'];
                                    break;
                                }
                            }
                        }
                        
                        echo "<tr>
                            <td>{$course_name}</td>
                            <td>{$course_code}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['due_date']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No assignments found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
