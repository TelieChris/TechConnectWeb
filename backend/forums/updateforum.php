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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forum_id = $_POST['forum_id'];
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];

    $sql = "UPDATE forums SET course_id='$course_id', title='$title', description='$description', created_by='$created_by', created_at='$created_at' WHERE forum_id='$forum_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Forum updated successfully";
    } else {
        echo "Error updating forum: " . $conn->error;
    }
}

$forum_id = $_GET['forum_id'];
$sql = "SELECT * FROM forums WHERE forum_id='$forum_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Forum</title>
</head>
<body>
    <h2>Update Forum</h2>
    <form action="updateforum.php" method="POST">
        <input type="hidden" name="forum_id" value="<?php echo $row['forum_id']; ?>">
        <label for="course_id">Course ID:</label><br>
        <input type="number" id="course_id" name="course_id" value="<?php echo $row['course_id']; ?>" required><br><br>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?php echo $row['description']; ?></textarea><br><br>

        <label for="created_by">Created By:</label><br>
        <input type="text" id="created_by" name="created_by" value="<?php echo $row['created_by']; ?>" required><br><br>

        <label for="created_at">Created At:</label><br>
        <input type="datetime-local" id="created_at" name="created_at" value="<?php echo date('Y-m-d\TH:i', strtotime($row['created_at'])); ?>" required><br><br>

        <input type="submit" value="Update Forum">
    </form>
</body>
</html>
