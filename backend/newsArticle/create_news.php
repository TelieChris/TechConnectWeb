<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $published_at = $_POST['published_at'];

    $sql = "INSERT INTO news (title, content, author_id, published_at) VALUES ('$title', '$content', '$author_id', '$published_at')";
    if ($conn->query($sql) === TRUE) {
        echo "New article created successfully";
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
    <title>Create News Article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create News Article</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="author_id">Author ID</label>
                <input type="number" class="form-control" id="author_id" name="author_id" required>
            </div>
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="datetime-local" class="form-control" id="published_at" name="published_at" required>
            </div>
            <button type="submit" class="btn btn-primary">Create News Article</button>
        </form>
    </div>
</body>
</html>
