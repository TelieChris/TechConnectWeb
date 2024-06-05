<?php
session_start();
include 'db_connection.php';

// Check if the news ID is provided
if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author_id = $_POST['author_id'];
        $published_at = $_POST['published_at'];

        // Convert published_at to proper MySQL datetime format
        $published_at = date('Y-m-d H:i:s', strtotime($published_at));

        $sql = "UPDATE news SET title='$title', content='$content', author_id='$author_id', published_at='$published_at' WHERE news_id=$news_id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Article updated successfully";
            $_SESSION['message_class'] = "alert-success";
        } else {
            $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION['message_class'] = "alert-danger";
        }
        header("Location: update_news.php?id=$news_id");
        exit();
    }

    // Fetch the existing news article details
    $sql = "SELECT * FROM news WHERE news_id=$news_id";
    $result = $conn->query($sql);
    $news = $result->fetch_assoc();

    // Fetch all users to display in the dropdown
    $sql = "SELECT user_id, username FROM users";
    $users = $conn->query($sql);

    // Check if there's a message to display and set a redirect to dashIndex.php
    if (isset($_SESSION['message'])) {
        $meta_redirect = '<meta http-equiv="refresh" content="3;url=dashIndex.php">';
    } else {
        $meta_redirect = '';
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News Article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php echo $meta_redirect; ?>
</head>
<body>
    <div class="container mt-5">
        <h2 class="alert alert-primary p-3 text-center">Update News Article</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['message_class']; ?> text-center">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['message_class']);
                ?>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required><?php echo htmlspecialchars($news['content']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    <option value="">Select Author</option>
                    <?php
                    if ($users->num_rows > 0) {
                        while ($row = $users->fetch_assoc()) {
                            $selected = $row['user_id'] == $news['author_id'] ? 'selected' : '';
                            echo "<option value='{$row['user_id']}' $selected>{$row['username']}</option>";
                        }
                    }
                    ?>
                </select>
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
