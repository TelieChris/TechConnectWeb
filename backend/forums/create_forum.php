<?php
// insertforum.php

// Database connection parameters
$servername = "localhost"; // change if your database is hosted elsewhere
$username = "root";        // change to your database username
$password = "";            // change to your database password
$dbname = "techconnectdb"; // change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
