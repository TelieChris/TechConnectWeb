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

?>
