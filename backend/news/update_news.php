<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $published_at = $_POST['published_at'];

    $sql = "UPDATE News SET title='$title', content='$content', author_id='$author_id', published_at='$published_at' WHERE news_id=$news_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $news_id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE news_id=$news_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
}
?>
