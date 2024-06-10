<?php
session_start();
include 'db_connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $published_at = $_POST['published_at'];

    // Convert published_at to proper MySQL datetime format
    $published_at = date('Y-m-d H:i:s', strtotime($published_at));

    $sql = "INSERT INTO news (title, content, author_id, published_at) VALUES ('$title', '$content', '$author_id', '$published_at')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "New article created successfully";
        $_SESSION['message_class'] = "alert-success";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['message_class'] = "alert-danger";
    }
    $conn->close();
    header("Refresh: 3; url=create_news.php"); 
    exit();
}

// Fetch all users to display in the dropdown
$sql = "SELECT user_id, username FROM users";
$users = $conn->query($sql);

// Check if there's a message to display and set a redirect to dashIndex.php
if (isset($_SESSION['message'])) {
    $meta_redirect = '<meta http-equiv="refresh" content="3;url=dashIndex.php">';
} else {
    $meta_redirect = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create News Article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php echo $meta_redirect; ?>
</head>
<body>
    <div class="container mt-5">
        <h2 class="alert alert-primary p-3 text-center">Create News Article</h2>

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
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    <option value="">Select Author</option>
                    <?php
                    if ($users->num_rows > 0) {
                        while($row = $users->fetch_assoc()) {
                            echo "<option value='{$row['user_id']}'>{$row['username']}</option>";
                        }
                    }
                    ?>
                </select>
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

<?php
$conn->close();
?>
