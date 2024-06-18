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

// Retrieve the ID from the URL
$forum_id = $_GET['forum_id'];

// Delete data from the database
$sql = "DELETE FROM forums WHERE forum_id='$forum_id'";

if ($conn->query($sql) === TRUE) {
    echo "Forum deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
