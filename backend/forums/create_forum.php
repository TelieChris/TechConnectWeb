<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forum_id = $_POST['forum_id'];
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];

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

    $sql = "INSERT INTO forums (forum_id, course_id, title, description, created_by, created_at)
            VALUES ('$forum_id', '$course_id', '$title', '$description', '$created_by', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "New forum created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
