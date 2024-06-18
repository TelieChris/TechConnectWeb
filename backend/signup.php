<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $role = $_POST['role'];
    $date_joined = date('Y-m-d H:i:s');

    // Handle file upload
    $profile_picture_url = null; // Initialize as null

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $profile_picture = $_FILES['profile_picture'];
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($profile_picture['name']);

        if (move_uploaded_file($profile_picture['tmp_name'], $upload_file)) {
            $profile_picture_url = $upload_file;
        } else {
            die("Error uploading your profile picture.");
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO users (username, password_hash, email, first_name, last_name, role, profile_picture, date_joined)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssss", $username, $password_hash, $email, $firstname, $lastname, $role, $profile_picture_url, $date_joined);

    if ($stmt->execute()) {
        echo '<script type="text/javascript">';
        echo 'alert("Account created successfully! Redirecting to login page...");';
        echo 'window.location.href = "../frontend/pages/login.html";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
