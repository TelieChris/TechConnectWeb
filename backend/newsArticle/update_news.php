<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author_id = $_POST['author_id'];
        $published_at = $_POST['published_at'];

        $sql = "UPDATE news SET title='$title', content='$content', author_id='$author_id', published_at='$published_at' WHERE news_id=$news_id";
        if ($conn->query($sql) === TRUE) {
            echo "Article updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM news WHERE news_id=$news_id";
    $result = $conn->query($sql);
    $news = $result->fetch_assoc();
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News Article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Update News Article</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $news['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required><?php echo $news['content']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="author_id">Author ID</label>
                <input type="number" class="form-control" id="author_id" name="author_id" value="<?php echo $news['author_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="<?php echo date('Y-m-d\TH:i', strtotime($news['published_at'])); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update News Article</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
