<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forum_id = $_POST['forum_id'];
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];

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
    $sql = "INSERT INTO forums (forum_id, course_id, title, description, created_by, created_at)
            VALUES ('$forum_id', '$course_id', '$title', '$description', '$created_by', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "New forum created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Forum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($message)) echo $message; ?>
        <h2 class="alert alert-primary">Create a New Forum</h2>
        <form action="insertforum.php" method="POST">
            <div class="form-group">
                <label for="forum_id">Forum ID</label>
                <select class="form-control" id="forum_id" name="forum_id" required>
                    <option value="">Select Forum</option>
                    <!-- Populate forum options from the database -->
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'forum_db');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM forums";
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
                <label for="course_id">Course ID</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Course ID</option>
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
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                 
                <select class="form-control" id="user_id" name="created_by" required>
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
                <label for="created_at">Created At</label>
                <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Forum</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
