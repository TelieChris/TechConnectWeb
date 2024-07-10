<?php

$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forum_id = $conn->real_escape_string($_POST['forum_id']);
    $course_id = $conn->real_escape_string($_POST['course_id']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $created_by = $conn->real_escape_string($_POST['created_by']);
    $created_at = $conn->real_escape_string($_POST['created_at']);

    $sql = "UPDATE forums SET course_id='$course_id', title='$title', description='$description', created_by='$created_by', created_at='$created_at' WHERE forum_id='$forum_id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Forum updated successfully.";
        $message_type = "success";
    } else {
        $message = "Error updating forum: " . $conn->error;
        $message_type = "danger";
    }
} else if (isset($_GET['forum_id'])) {
    $forum_id = $conn->real_escape_string($_GET['forum_id']);
    $row = null;
    $sql = "SELECT * FROM forums WHERE forum_id='$forum_id'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $message = "Forum not found.";
        $message_type = "danger";
    }
} else {
    $message = "Forum ID is missing.";
    $message_type = "danger";
}

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
    <h2 class="btn btn-primary p-3 w-100">Update Forum</h2>
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (!empty($row)): ?>
        <form action="updateforum.php" method="POST">
            <input type="hidden" name="forum_id" value="<?php echo htmlspecialchars($row['forum_id']); ?>">
            <div class="form-group">
                <label for="course_id">Course ID</label>
                <select class="form-control" id="course_id" name="course_id" required>
                    <option value="">Select Course</option>
                    <?php
                    $conn = new mysqli($host, $user, $pass, $dbname, $port);
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
                    <?php
                    $conn = new mysqli($host, $user, $pass, $dbname, $port);
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
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
