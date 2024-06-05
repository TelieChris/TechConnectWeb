<?php
session_start();
include 'db_connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = $_POST['course_id'];
    $name = $_POST['course_name'];
    $description = $_POST['course_description'];
    $code = $_POST['course_code'];
    $faculty = $_POST['faculty_id'];

    // Convert published_at to proper MySQL datetime format
    //$published_at = date('Y-m-d H:i:s', strtotime($published_at));

    $sql = "INSERT INTO courses (course_id, course_name, course_description, course_code, faculty_id) 
    VALUES ('$module', '$name', '$description', '$code', '$faculty')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "New article created successfully";
        $_SESSION['message_class'] = "alert-success";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['message_class'] = "alert-danger";
    }
    $conn->close();
    header("Location: courseCreation.php");
    exit();
}

// Fetch all users to display in the dropdown
//$sql = "SELECT user_id, username FROM users";
//$users = $conn->query($sql);

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
    <title>Create New Course</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php echo $meta_redirect; ?>
</head>
<body>
    <div class="container mt-5">
        <h2 class="alert alert-primary p-3 text-center">Create New Course</h2>

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
                <label for="course">Course Id</label>
                <input type="number" class="form-control" id="module" name="Id" required>
            </div>
            <div class="form-group">
                <label for="cnamet">Course Name</label>
                <textarea class="form-control" id="course_name" name="course_name" required></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="codet">Course Code</label>
                <textarea class="form-control" id="course_name" name="course_name" required></textarea>
            </div>
            <div class="form-group">
                <label for="faculty">Faculty Id</label>
                <input type="number" class="form-control" id="faculty" name="faculty" required>
            </div>
            <button type="submit" class="btn btn-primary">Create New Course</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
