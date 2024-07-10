<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = '127.0.0.1';
$dbname = 'techconnectdb';
$user = 'root';
$pass = '';
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['token']) && isset($_POST['password'])) {
        $token = $_POST['token'];
        $password = $_POST['password'];

        // Check if token is valid
        $sql = "SELECT user_id FROM users WHERE JSON_EXTRACT(profile_picture, '$.token') = ? AND JSON_EXTRACT(profile_picture, '$.expires') > ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing the SQL statement: " . $conn->error);
        }
        $current_time = time();
        $stmt->bind_param("si", $token, $current_time);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id);
            $stmt->fetch();

            // Update the password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password_hash = ?, profile_picture = NULL WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $password_hash, $user_id);
            if ($stmt->execute()) {
                $message = "Your password has been reset successfully.";
            } else {
                $message = "Error updating password: " . $stmt->error;
            }
        } else {
            $message = "Invalid or expired token.";
        }

        $stmt->close();
    } else {
        $message = "Please fill in all fields.";
    }
} else if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    $message = "No token provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Reset Password</h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($token)): ?>
            <form action="reset_password.php" method="post">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
