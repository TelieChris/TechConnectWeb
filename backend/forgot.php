<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Adjust the path if needed
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

function send_reset_email($email, $token) {
    $reset_link = "http://localhost/TechConnectWeb/backend/reset_password.php?token=" . urlencode($token);
    $subject = "Password Reset Request";
    $message = "Please click on the following link to reset your password: " . $reset_link;

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey'; // SMTP username (use 'apikey' for SendGrid)
        //$mail->Password = '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'; // SMTP password (API Key)
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('techconnectweb1@gmail.com', 'TechConnect'); // Your email address
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $_SESSION['message'] = "Password reset email sent.";
        $_SESSION['message_type'] = "info";
    } catch (Exception $e) {
        $_SESSION['message'] = "Failed to send password reset email. Error: {$mail->ErrorInfo}";
        $_SESSION['message_type'] = "danger";
        error_log("Failed to send password reset email to $email: {$mail->ErrorInfo}", 0);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $sql = "SELECT user_id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id);
            $stmt->fetch();

            $token = bin2hex(random_bytes(16));
            $expires = time() + 3600; // Token expires in 1 hour
            $token_data = json_encode(['token' => $token, 'expires' => $expires]);

            $sql = "UPDATE users SET profile_picture = ? WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $token_data, $user_id);
            if ($stmt->execute()) {
                send_reset_email($email, $token);
            } else {
                $_SESSION['message'] = "Error storing reset token: " . $stmt->error;
                $_SESSION['message_type'] = "danger";
                error_log("Error storing reset token for user $user_id: " . $stmt->error, 0);
            }
        } else {
            $_SESSION['message'] = "No user found with that email address.";
            $_SESSION['message_type'] = "danger";
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Please provide an email address.";
        $_SESSION['message_type'] = "danger";
    }

    $conn->close();
    header("Location: forgot.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Password Reset</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Request Password Reset</h2>
        <?php 
        if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
                <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
                ?>
            </div>
        <?php endif; ?>
        <form action="forgot.php" method="post">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Request Reset</button>
        </form>
    </div>
</body>
</html>
