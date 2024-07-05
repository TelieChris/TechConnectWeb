<?php
// Database connection details
$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $course_name = $_POST['course_name'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];

    $sql = "UPDATE course_timetable SET course_name='$course_name', day='$day', time='$time', venue='$venue' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Timetable entry updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch existing data
$id = $_GET['id'];
$sql = "SELECT course_name, day, time, venue FROM course_timetable WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Timetable Entry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Timetable Entry</h2>
        <form action="updatetimetable.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $row['course_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="day">Day:</label>
                <input type="text" class="form-control" id="day" name="day" value="<?php echo $row['day']; ?>" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" id="time" name="time" value="<?php echo $row['time']; ?>" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $row['venue']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>
