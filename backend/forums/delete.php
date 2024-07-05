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
