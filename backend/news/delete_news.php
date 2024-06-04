<?php
include 'db.php';

$news_id = $_GET['id'];

$sql = "DELETE FROM News WHERE news_id=$news_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<a href="read_news.php">Back to News List</a>
