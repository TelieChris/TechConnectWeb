<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $forum_id = mysqli_real_escape_string($conn, $_POST['forum_id']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO posts (forum_id, user_id, content, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("iiss", $forum_id, $user_id, $content, $created_at);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>New post created successfully.</div>";
        header("Refresh: 3; url=create_post.php"); // Refresh after 3 minutes (180 seconds)
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    // Close the statement
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($message)) echo $message; ?>
        <h2 class="alert alert-primary">Create Post</h2>
        <form action="create_post.php" method="post">
            <div class="form-group">
                <label for="forum_id">Forum ID</label>
                <select class="form-control" id="forum_id" name="forum_id" required>
                    <option value="">Select Forum</option>
                    <!-- Populate forum options from the database -->
                    <?php
                    $sql = "SELECT * FROM forums"; // Example query to get forums
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['forum_id']}'>{$row['title']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Select User</option>
                    <!-- Populate user options from the database -->
                    <?php
                    $sql = "SELECT * FROM users"; // Example query to get users
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['user_id']}'>{$row['username']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
</body>
</html>
