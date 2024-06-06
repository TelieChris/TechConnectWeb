<?php
$servername = "localhost"; // Replace with your database server details
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "techconnectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$servername = "localhost"; // Replace with your database server details
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "techconnectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $role = $_POST['role'];
    $date_joined = date('Y-m-d H:i:s');

    // Handle file upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $profile_picture = $_FILES['profile_picture'];
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($profile_picture['name']);

        if (move_uploaded_file($profile_picture['tmp_name'], $upload_file)) {
            $profile_picture_url = $upload_file;
        } else {
            die("Error uploading your profile picture.");
        }
    } else {
        $profile_picture_url = null; // Or set a default picture URL
    }

    // Insert data into the database
    $sql = "INSERT INTO users (username, password, email, firstname, lastname, role, profile_picture_url, date_joined)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssss", $username, $password, $email, $firstname, $lastname, $role, $profile_picture_url, $date_joined);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

?>

