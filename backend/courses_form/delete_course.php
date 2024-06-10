<?php
session_start();
include 'db_connection.php';

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // SQL to delete a record
    $sql = "DELETE FROM courses WHERE course_id = $course_id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Course deleted successfully";
        $_SESSION['message_class'] = "alert-success";
    } else {
        $_SESSION['message'] = "Error deleting course: " . $conn->error;
        $_SESSION['message_class'] = "alert-danger";
    }

    $conn->close();
    header("Location: view_course.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid course ID";
    $_SESSION['message_class'] = "alert-danger";
    header("Location: view_course.php");
    exit();
}
?>
