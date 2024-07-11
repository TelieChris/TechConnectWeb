<?php
$host = getenv('DB_HOST') ?: 'sql12.freesqldatabase.com';
$dbname = getenv('DB_NAME') ?: 'sql12716221';
$user = getenv('DB_USER') ?: 'sql12716221';
$pass = getenv('DB_PASSWORD') ?: 'FfJUdVvA73';
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
