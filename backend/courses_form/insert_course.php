<?php
session_start();
include 'db_connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['course_name'];
    $description = $_POST['course_description'];
    $code = $_POST['course_code'];
    $faculty = $_POST['faculty_id'];

    // Prepare an insert statement
    $sql = "INSERT INTO courses (course_name, course_description, course_code, faculty_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $description, $code, $faculty);

    if ($stmt->execute() === TRUE) {
        $_SESSION['message'] = "New record inserted successfully!";
        $_SESSION['message_class'] = "alert-success";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['message_class'] = "alert-danger";
    }

    $stmt->close();
    $conn->close();
    
    // Redirect to the same page
    header("Location: insert_course.php"); 
    exit();
}

// Fetch all faculties to display in the dropdown
// you can fetch from faculty by selecting its Id 
$sql = "SELECT faculty_id, name FROM faculty";
$faculties = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Course</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>
            <div class="form-group">
                <label for="course_description">Description</label>
                <textarea class="form-control" id="course_description" name="course_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="course_code">Course Code</label>
                <input type="text" class="form-control" id="course_code" name="course_code" required>
            </div>
            <div class="form-group">
                <label for="faculty_id">Faculty Name</label>
                <select class="form-control" id="faculty_id" name="faculty_id" required>
                    <option value="">Select Faculty</option>
                    <?php
                    if ($faculties->num_rows > 0) {
                        while($row = $faculties->fetch_assoc()) {
                            echo "<option value='{$row['faculty_id']}'>{$row['name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create New Course</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
