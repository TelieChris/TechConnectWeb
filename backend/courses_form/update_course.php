<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $name = $_POST['course_name'];
    $description = $_POST['course_description'];
    $code = $_POST['course_code'];
    $faculty = $_POST['faculty_id'];

    $sql = "UPDATE courses SET course_name=?, course_description=?, course_code=?, faculty_id=? WHERE course_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $name, $description, $code, $faculty, $course_id);

    if ($stmt->execute() === TRUE) {
        $_SESSION['message'] = "Course updated successfully";
        $_SESSION['message_class'] = "alert-success";
    } else {
        $_SESSION['message'] = "Error updating course: " . $stmt->error;
        $_SESSION['message_class'] = "alert-danger";
    }

    $stmt->close();
    $conn->close();
    header("Location: view_course.php");
    exit();
}

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Fetch course details
    $sql = "SELECT * FROM courses WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();

    if (!$course) {
        $_SESSION['message'] = "Course not found";
        $_SESSION['message_class'] = "alert-danger";
        header("Location: view_course.php");
        exit();
    }

    // Fetch all faculties to display in the dropdown
    $sql = "SELECT faculty_id, name FROM faculty";
    $faculties = $conn->query($sql);
} else {
    $_SESSION['message'] = "Invalid course ID";
    $_SESSION['message_class'] = "alert-danger";
    header("Location: view_course.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="alert alert-primary p-3 text-center">Update Courses</h2>

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
            <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course['course_id']); ?>">
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo htmlspecialchars($course['course_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="course_description">Description</label>
                <textarea class="form-control" id="course_description" name="course_description" required><?php echo htmlspecialchars($course['course_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="course_code">Course Code</label>
                <input type="text" class="form-control" id="course_code" name="course_code" value="<?php echo htmlspecialchars($course['course_code']); ?>" required>
            </div>
            <div class="form-group">
                <label for="faculty_id">Faculty Id</label>
                <select class="form-control" id="faculty_id" name="faculty_id" required>
                    <option value="">Select Faculty</option>
                    <?php
                    if ($faculties->num_rows > 0) {
                        while($row = $faculties->fetch_assoc()) {
                            $selected = ($row['faculty_id'] == $course['faculty_id']) ? 'selected' : '';
                            echo "<option value='{$row['faculty_id']}' $selected>" . htmlspecialchars($row['name']) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
