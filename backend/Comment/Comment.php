<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techconnectdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $post_id = $_POST['post_id'];
        $user_id = $_POST['user_id'];
        $content = $_POST['content'];
        $created_at = $_POST['created_at'];

        $sql = "INSERT INTO comments (post_id, user_id, content, created_at) VALUES ('$post_id', '$user_id', '$content', '$created_at')";
        if ($conn->query($sql) === TRUE) {
            echo "New comment created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $comment_id = $_POST['comment_id'];
        $post_id = $_POST['post_id'];
        $user_id = $_POST['user_id'];
        $content = $_POST['content'];
        $created_at = $_POST['created_at'];

        $sql = "UPDATE comments SET post_id='$post_id', user_id='$user_id', content='$content', created_at='$created_at' WHERE comment_id='$comment_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Comment updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        $comment_id = $_POST['comment_id'];

        $sql = "DELETE FROM comments WHERE comment_id='$comment_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Comment deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Comments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Comment</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="post_id">Post ID</label>
                <input type="number" class="form-control" id="post_id" name="post_id" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create Comment</button>
        </form>
        
        <h2 class="mt-5">Update/Delete Comment</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="comment_id">Comment ID</label>
                <input type="number" class="form-control" id="comment_id" name="comment_id" required>
            </div>
            <div class="form-group">
                <label for="post_id">Post ID</label>
                <input type="number" class="form-control" id="post_id" name="post_id" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Comment</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete Comment</button>
        </form>

        <h2 class="mt-5">Comments List</h2>
        <?php
        $i12=1;
        $result = $conn->query("SELECT * FROM comments");
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<tr><th>Comment ID</th><th>Post ID</th><th>User ID</th><th>Content</th><th>Created At</th></tr>';
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>$i12</td><td>{$row['post_id']}</td><td>{$row['user_id']}</td><td>{$row['content']}</td><td>{$row['created_at']}</td></tr>";
            }
            echo '</table>';
        } else {
            echo "No comments found.";
        }
        $conn->close();
        $i12++;
        ?>
    </div>
</body>
</html>
