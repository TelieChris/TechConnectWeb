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
    $course_name = $_POST['course_name'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];

    $sql = "INSERT INTO course_timetable (course_name, day, time, venue) VALUES ('$course_name', '$day', '$time', '$venue')";
    if ($conn->query($sql) === TRUE) {
        echo "New timetable entry created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Timetable Entry</title>
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
        <h2>Create Timetable Entry</h2>
        <form action="createtimetable.php" method="post">
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>
            <div class="form-group">
                <label for="day">Day:</label>
                <select class="form-control" id="day" name="day" required>
                    <option>Select day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    
    </select>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <select class="form-control" id="time" name="time" required>
                    <option>Select Time</option>
                    <option value="8:30-9:20 AM">8:30-9:20 AM</option>
                    <option value="9:20-10:10 AM">9:20-10:10 AM</option>
                    <option value="10:10-11:00 AM">10:10-11:00 AM</option>
                    <option value="11:00-11: 20 AM">11:00-11: 20 AM</option>
                    <option value="11:20 AM-12:10 PM">11:20 AM-12:10 PM</option>
                    <option value="12 :10-1:00 PM"> 12 :10-1:00 PM</option>
                    <option value="1:00-2:30 PM"> 1:00-2:30 PM</option>
                    <option value="2:30-3:20 PM">2:30-3:20 PM</option>
                    <option value="3:20-4:10 PM">3:20-4:10 PM</option>
                    <option value="4:10-5:00 PM">4:10-5:00 PM</option>
    </select>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" class="form-control" id="venue" name="venue" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>
