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

// Retrieve forum posts from the database
$sql = "SELECT * FROM forums";
$result = $conn->query($sql);

// Check if there are forum posts
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>Forum Posts Report</h2>";
    echo "<table class='table'>";
    echo "<thead><tr><th>ID</th><th>Course ID</th><th>Title</th><th>Description</th><th>Created By</th><th>Created At</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["course_id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["description"] . "</td><td>" . $row["created_by"] . "</td><td>" . $row["created_at"] . "</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No forum posts found.";
}

$conn->close();
?>
