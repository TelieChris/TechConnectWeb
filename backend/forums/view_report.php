<?php
$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;


// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM forums";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Forum ID</th><th>Course ID</th><th>Title</th><th>Description</th><th>Created By</th><th>Created At</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["forum_id"]. "</td><td>" . $row["course_id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["created_by"]. "</td><td>" . $row["created_at"]. "</td><td><a href='updateforum.php?forum_id=" . $row["forum_id"]. "'>Edit</a> | <a href='deleteforum.php?forum_id=" . $row["forum_id"]. "'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
