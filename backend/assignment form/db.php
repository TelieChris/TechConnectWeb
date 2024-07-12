<?php
<<<<<<< HEAD
	$database_username = 'root';
	$database_password = '';
	$pdo_conn = new PDO( 'mysql:host=localhost;dbname=techconnectdb', $database_username, $database_password );
?>
=======
$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;

try {
    $pdo_conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
>>>>>>> f97a2a38254e7f8f0e8ebf11d4b84b8087b74dda
