<?php
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
$forum_id = $_GET['forum_id'];

$sql = "DELETE FROM forums WHERE forum_id='$forum_id'";

if ($conn->query($sql) === TRUE) {
    echo "Forum deleted successfully";
} else {
    echo "Error deleting forum: " . $conn->error;
}

$conn->close();
?>
