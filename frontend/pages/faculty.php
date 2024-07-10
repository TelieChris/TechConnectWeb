<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../backend/login.php");
    exit();
}

$username = $_SESSION['username'];

$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lecturers = [];

$sql_lecturers = "SELECT user_id, username FROM users WHERE role = 'lecturer'";

if ($result = $conn->query($sql_lecturers)) {
    while ($row = $result->fetch_assoc()) {
        $lecturers[] = $row;
    }
    $result->free();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty - Admin Dashboard</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #F3F4F6;
        }

        .header {
            background-color: #00073D;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #00073D;
            color: white;
            padding: 20px;
        }

        .profile {
            margin-bottom: 20px;
        }

        .profile p {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            margin: 10px 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        nav ul li a.active, nav ul li a:hover {
            background-color: #2563EB;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #2563EB;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1E3A8A;
        }

        footer {
            background-color: #00173D;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Admin Dashboard - TechConnect</h1>
    </header>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <p>Hi, <?php echo htmlspecialchars($username); ?></p>
            </div>
            <nav>
                <ul>
                    <li><a href="AdminPage.php">Dashboard</a></li>
                    <li><a href="view_students.php">View Students</a></li>
                    <li><a href="view_staff.php">View Staff</a></li>
                    <li><a href="faculty.php" class="active">Add Faculty</a></li>
                    <li><a href="view_faculty.php">View Faculties</a></li>
                    <li><a href="../../backend/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <div class="form-container">
                <h2>Add Faculty</h2>
                <form action="process_add_faculty.php" method="POST">
                    <label for="faculty_name">Faculty Name</label>
                    <input type="text" id="faculty_name" name="name" required>
                    
                    <label for="faculty_description">Faculty Description</label>
                    <textarea id="faculty_description" name="description" rows="4" required></textarea>
                    
                    <label for="head_of_faculty">Head of Faculty</label>
                    <select id="head_of_faculty" name="head_of_faculty" required>
                        <option value="">Select Head of Faculty</option>
                        <?php foreach ($lecturers as $lecturer): ?>
                            <option value="<?php echo htmlspecialchars($lecturer['username']); ?>">
                                <?php echo htmlspecialchars($lecturer['username']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <button type="submit">Submit</button>
                </form>
                <?php
                if (isset($_SESSION['message'])) {
                    $message_type = $_SESSION['message_type'] == 'success' ? 'color: green;' : 'color: red;';
                    echo "<p style='$message_type'>" . $_SESSION['message'] . "</p>";
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 TechConnect. All rights reserved.</p>
    </footer>
</body>
</html>
