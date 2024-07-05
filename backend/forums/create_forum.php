<?php
// insertforum.php

// Database connection parameters
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

// Get form data
$forum_id = $_POST['forum_id'];
$course_id = $_POST['course_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$created_by = $_POST['created_by'];
$created_at = $_POST['created_at'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO forums (forum_id, course_id, title, description, created_by, created_at) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iissis", $forum_id, $course_id, $title, $description, $created_by, $created_at);

// Execute the statement
if ($stmt->execute()) {
    echo "New forum created successfully";
} else {
    echo "New forum not created";
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
