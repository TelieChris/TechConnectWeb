<?php
$conn = new mysqli('localhost', 'root', '', 'forum_db');

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
