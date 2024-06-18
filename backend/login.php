<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12714518';
$user = 'sql12714518';
$pass = 'vgMtId84uh';
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and bind
        $sql = "SELECT user_id, password_hash, role FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing the SQL statement: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $password_hash, $role);
            $stmt->fetch();

            if (password_verify($password, $password_hash)) {
                // Password is correct, set session variables
                session_regenerate_id(); // Regenerate session ID to prevent session fixation
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                if ($role == 'student') {
                    echo "Redirecting to: ../frontend/Dashboard/Student/StudentDashboard.html";
                    header("Location: ../frontend/Dashboard/Student/StudentDashboard.html");
                } else if ($role == 'faculty') {
                    echo "Redirecting to: ../frontend/Dashboard/Admin/index.html";
                    header("Location: ../frontend/Dashboard/Admin/index.html");
                }
                exit();
            } else {
                // Invalid password
                $error_message = "Invalid username or password.";
            }
        } else {
            // Invalid username
            $error_message = "Invalid username or password.";
        }

        $stmt->close();
    } else {
        $error_message = "Please fill in both username and password.";
    }
}

$conn->close();
?>

