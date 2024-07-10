<?php
$conn = new mysqli('localhost', 'root', '', 'techconnectdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forum_id = $conn->real_escape_string($_POST['forum_id']);
    $course_id = $conn->real_escape_string($_POST['course_id']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $created_by = $conn->real_escape_string($_POST['created_by']);
    $created_at = $conn->real_escape_string($_POST['created_at']);

    $sql = "UPDATE forums SET course_id='$course_id', title='$title', description='$description', created_by='$created_by', created_at='$created_at' WHERE forum_id='$forum_id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Forum updated successfully";
    } else {
        $message = "Error updating forum: " . $conn->error;
    }
}

$forum_id = $conn->real_escape_string($_GET['forum_id']);
$sql = "SELECT * FROM forums WHERE forum_id='$forum_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Forum</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Update Forum</h2>
    <?php if (!empty($message)) echo "<div class='alert alert-info'>$message</div>"; ?>
    <form action="updateforum.php" method="POST">
        <div class="form-group">
            <label for="forum_id">Forum ID</label>
            <input type="text" class="form-control" id="forum_id" name="forum_id" value="<?php echo htmlspecialchars($row['forum_id']); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <select class="form-control" id="course_id" name="course_id" required>
                <option value="">Select Course</option>
                <!-- Populate course options from the database -->
                <?php
                $conn = new mysqli('localhost', 'root', '', 'forum_db');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM courses";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($course_row = $result->fetch_assoc()) {
                        $selected = ($course_row['course_id'] == $row['course_id']) ? 'selected' : '';
                        echo "<option value='{$course_row['course_id']}' $selected>{$course_row['course_name']}</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="created_by">Created By</label>
            <select class="form-control" id="created_by" name="created_by" required>
                <option value="">Select User</option>
                <!-- Populate user options from the database -->
                <?php
                $conn = new mysqli('localhost', 'root', '', 'forum_db');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($user_row = $result->fetch_assoc()) {
                        $selected = ($user_row['user_id'] == $row['created_by']) ? 'selected' : '';
                        echo "<option value='{$user_row['user_id']}' $selected>{$user_row['username']}</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="created_at">Created At</label>
            <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo date('Y-m-d\TH:i', strtotime($row['created_at'])); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Forum</button>
    </form>
</div>
</body>
</html>
