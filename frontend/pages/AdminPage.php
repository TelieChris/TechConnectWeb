<?php
// session_start();

// if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
//     header("Location: ../../pages/login.php");
//     exit();
// }

// $username = $_SESSION['username'];

$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$students = [];
$staff = [];

$sql_students = "SELECT user_id, username, email FROM users WHERE role = 'student'";
$sql_staff = "SELECT user_id, username, email FROM users WHERE role = 'staff'";

if ($result = $conn->query($sql_students)) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    $result->free();
}

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
    <title>Admin Dashboard - TechConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                    <li><a href="AdminPage.php" class="active">Dashboard</a></li>
                    <li><a href="view_students.php">View Students</a></li>
                    <li><a href="view_staff.php">View Staff</a></li>
                    <li><a href="faculty.php">Add faculity</a></li>
                    <li><a href="view_faculty.php">View Faculties</a></li>
                    <li><a href="../../backend/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <div class="alert alert-success" role="alert">
                Welcome to the Admin Dashboard!
            </div>

            <h2>Students List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($student['username']); ?></td>
                        <td><?php echo htmlspecialchars($student['email']); ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Staff Members List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staff as $staff_member): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($staff_member['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($staff_member['username']); ?></td>
                        <td><?php echo htmlspecialchars($staff_member['email']); ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
