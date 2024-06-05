<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Forum</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Forum</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root"; // Change this if your database uses a different username
            $password = ""; // Change this if your database has a password
            $dbname = "techconnectdb"; // Database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Create table if it doesn't exist
            $sql = "CREATE TABLE IF NOT EXISTS forums (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                course_id INT(6) NOT NULL,
                title VARCHAR(255) NOT NULL,
                description TEXT,
                created_by INT(6) NOT NULL,
                created_at DATETIME NOT NULL
            )";

            if ($conn->query($sql) === FALSE) {
                echo "Error creating table: " . $conn->error;
            }

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO forums (course_id, title, description, created_by, created_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isssi", $course_id, $title, $description, $created_by, $created_at);

            // Set parameters and execute
            $course_id = $_POST['course_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $created_by = $_POST['created_by'];
            $created_at = date("Y-m-d H:i:s", strtotime($_POST['created_at']));

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>New record created successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="create_forum.php" method="POST">
            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="number" class="form-control" id="course_id" name="course_id" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="created_by">Created By (User ID)</label>
                <input type="number" class="form-control" id="created_by" name="created_by" required>
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Forum</button>
        </form>
    </div>
</body>
</html>
