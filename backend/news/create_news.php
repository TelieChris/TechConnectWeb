<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $published_at = $_POST['published_at'];

    $sql = "INSERT INTO News (title, content, author_id, published_at) VALUES ('$title', '$content', '$author_id', '$published_at')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create News</title>
</head>
<body>
    <h2>Create News</h2>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"></textarea><br>
        <label for="author_id">Author ID:</label><br>
        <input type="text" id="author_id" name="author_id"><br>
        <label for="published_at">Published At:</label><br>
        <input type="datetime-local" id="published_at" name="published_at"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
