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
    $sql = "SELECT * FROM News WHERE news_id=$news_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News</title>
</head>
<body>
    <h2>Update News</h2>
    <form method="post" action="">
        <input type="hidden" id="news_id" name="news_id" value="<?php echo $row['news_id']; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"><?php echo $row['content']; ?></textarea><br>
        <label for="author_id">Author ID:</label><br>
        <input type="text" id="author_id" name="author_id" value="<?php echo $row['author_id']; ?>"><br>
        <label for="published_at">Published At:</label><br>
        <input type="datetime-local" id="published_at" name="published_at" value="<?php echo date('Y-m-d\TH:i', strtotime($row['published_at'])); ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
