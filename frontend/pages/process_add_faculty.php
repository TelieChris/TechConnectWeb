<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../pages/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'sql12.freesqldatabase.com';
    $dbname = 'sql12716221';
    $user = 'sql12716221';
    $pass = 'FfJUdVvA73';
    $port = 3306;

    $conn = new mysqli($host, $user, $pass, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $faculty_name = $conn->real_escape_string($_POST['name']);
    $faculty_description = $conn->real_escape_string($_POST['description']);
    $head_of_faculty = $conn->real_escape_string($_POST['head_of_faculty']);

    $sql = "INSERT INTO faculty (name, description, head_of_faculty) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $conn->error);
    }
    $stmt->bind_param("sss", $faculty_name, $faculty_description, $head_of_faculty);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Faculty added successfully.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error adding faculty: " . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: faculty.php");
    exit();
} else {
    header("Location: faculty.php");
    exit();
}
?>
