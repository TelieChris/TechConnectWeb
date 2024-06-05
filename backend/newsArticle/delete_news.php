<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    $sql = "DELETE FROM news WHERE news_id=$news_id";
    if ($conn->query($sql) === TRUE) {
        echo "Article deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No article ID provided";
}

$conn->close();

header("Location: index.php");
exit();
?>
