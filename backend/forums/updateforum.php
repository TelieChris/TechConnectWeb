<?php
// Database configuration
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

// Retrieve form data
$course_id = $_POST['course_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$created_by = $_POST['created_by'];
$created_at = $_POST['created_at'];

// Validate form data
if(empty($course_id) || empty($title) || empty($created_by) || empty($created_at)) {
    echo "All fields are required.";
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO forums (course_id, title, description, created_by, created_at) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $course_id, $title, $description, $created_by, $created_at);

// Execute the statement
if ($stmt->execute()) {
    echo "New forum created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
