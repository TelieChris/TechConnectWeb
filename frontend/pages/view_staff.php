<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../pages/login.php");
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

$staff = [];

$sql_staff = "SELECT user_id, username, email FROM users WHERE role = 'lecturer'";

if ($result = $conn->query($sql_staff)) {
    while ($row = $result->fetch_assoc()) {
        $staff[] = $row;
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
    <title>View Staff - Admin Dashboard</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #E5E7EB;
        }

        table th {
            background-color: #E5E7EB;
        }

        button {
            margin: 10px 5px;
            padding: 10px 20px;
            background-color: #2563EB;
            color: white;
            border: none;
            border-radius: 5px;
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
        <h1>View Staff - Admin Dashboard</h1>
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
                    <li><a href="view_staff.php" class="active">View Staff</a></li>
                    <li><a href="../../backend/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <h2>Staff Members List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staff as $staff_member): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($staff_member['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($staff_member['username']); ?></td>
                        <td><?php echo htmlspecialchars($staff_member['email']); ?></td>
                        <!-- Inside the table loop in view_staff.php -->
                        <td>
                            <form action="update_staff.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $staff_member['user_id']; ?>">
                                <input type="text" name="username" value="<?php echo htmlspecialchars($staff_member['username']); ?>">
                                <input type="email" name="email" value="<?php echo htmlspecialchars($staff_member['email']); ?>">
                                <button type="submit">Update</button>
                            </form>
    
                        </td>
                        <!-- Inside the table loop in view_staff.php -->
                        <td>
                        <form action="delete_staff.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                <input type="hidden" name="user_id" value="<?php echo $staff_member['user_id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 TechConnect. All rights reserved.</p>
    </footer>
</body>
</html>
