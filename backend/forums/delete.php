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

// Check if the delete request has been sent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $delete_id = $_POST["delete_id"];

    // Prepare and bind the delete statement
    $stmt = $conn->prepare("DELETE FROM forums WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    // Execute the delete statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
