<?php
// Database connection details
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

// Check if ID parameter is set
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve forum post details based on ID
    $sql = "SELECT * FROM forums WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch forum post details
        $row = $result->fetch_assoc();
        $course_id = $row['course_id'];
        $title = $row['title'];
        $description = $row['description'];
        $created_by = $row['created_by'];
        $created_at = $row['created_at'];
    } else {
        echo "Forum post not found.";
        exit();
    }
} else {
    echo "ID parameter is missing.";
    exit();
}

// Check if form is submitted for updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update forum post details
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];

    // Prepare and bind update statement
    $stmt = $conn->prepare("UPDATE forums SET course_id=?, title=?, description=?, created_by=?, created_at=? WHERE id=?");
    $stmt->bind_param("issssi", $course_id, $title, $description, $created_by, $created_at, $id);

    // Execute the update statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Forum post updated successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating forum post: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Forum Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Forum Post</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="number" class="form-control" id="course_id" name="course_id" value="<?php echo $course_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="created_by">Created By (User ID)</label>
                <input type="number" class="form-control" id="created_by" name="created_by" value="<?php echo $created_by; ?>" required>
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo date('Y-m-d\TH:i', strtotime($created_at)); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Forum Post</button>
        </form>
    </div>
</body>
</html>
