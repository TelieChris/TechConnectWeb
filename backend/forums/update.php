<?php
// Database configuration
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

// Retrieve and validate form data
$forum_id = isset($_POST['forum_id']) ? $_POST['forum_id'] : null;
$course_id = isset($_POST['course_id']) ? $_POST['course_id'] : null;
$title = isset($_POST['title']) ? $_POST['title'] : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
$created_by = isset($_POST['created_by']) ? $_POST['created_by'] : null;
$created_at = isset($_POST['created_at']) ? $_POST['created_at'] : null;

// Validate form data
if(empty($forum_id) || empty($course_id) || empty($title) || empty($created_by) || empty($created_at)) {
    echo "All fields are required.";
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("UPDATE forums SET course_id = ?, title = ?, description = ?, created_by = ?, created_at = ? WHERE forum_id = ?");
$stmt->bind_param("issssi", $course_id, $title, $description, $created_by, $created_at, $forum_id);

// Execute the statement
if ($stmt->execute()) {
    echo "Forum updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
