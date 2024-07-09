<?php
session_start();

if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: ../../../backend/login.php");
    exit();
}
$username = $_SESSION['username'];
$userRole = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #00073D;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .profile img {
            border-radius: 50%;
            width: 100px;
        }

        .profile p {
            margin: 10px 0 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            width: 100%;
            margin: 10px 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            text-align: left;
            border-radius: 5px;
        }

        nav ul li a.active, nav ul li a:hover {
            background-color: #2563EB;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #F3F4F6;
            overflow-y: auto;
        }

        .main-content h1 {
            margin-top: 0;
        }

        .courses h2 {
            color: #1E3A8A;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #E5E7EB;
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
            padding: 30px 0;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-container h2 {
            margin: 0;
            padding-bottom: 20px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 32px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
        }

        .footer-bottom {
            margin-top: 20px;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 14px;
            color: yellow;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-between;
                padding: 10px;
            }

            .profile img {
                width: 50px;
            }

            nav ul {
                display: flex;
                flex-wrap: wrap;
            }

            nav ul li {
                margin: 5px;
            }

            .main-content {
                padding: 10px;
            }

            table th, table td {
                padding: 5px;
            }
        }

        @media (max-width: 480px) {
            nav ul li a {
                padding: 5px;
                font-size: 12px;
            }

            .profile p {
                font-size: 12px;
            }
        }
        b{
            text-transform: capitalize;
        }
    </style>
</head>
<body>            
    <div class="container" style="display: flex;">
        <div class="sidebar">
            <div class="profile">
                <!-- <img src="profile-pic.png" alt="Profile Picture"> -->
                <p>Hi, <?php echo htmlspecialchars($username); ?></p>
                <p>You logged in As: <b><?php echo htmlspecialchars($userRole); ?></b></p>
            </div>
            <nav>
                <ul>
                    <li><a href="home_page.html" target="content-frame" onclick="setActive(this)" class="active">Home</a></li>
                    <li><a href="../../../backend/courses_form/view_course_student.php" target="content-frame" onclick="setActive(this)">My Courses</a></li>
                    <li><a href="../../../backend/assignment form/" target="content-frame" onclick="setActive(this)">Assignments</a></li>
                    <li><a href="../../../backend/courseTimeTable/courseTimetable.php" target="content-frame" onclick="setActive(this)">Time Table</a></li>
                    <li><a href="../../../backend/forums/view_report.php" target="content-frame" onclick="setActive(this)">Forum</a></li>
                    <li><a href="news.html" target="content-frame" onclick="setActive(this)">News</a></li>
                    <li><a href="settings.html" target="content-frame" onclick="setActive(this)">Settings</a></li>
                    <li><a href="../../../backend/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content" style="margin: 50px;">
            <iframe src="home_page.html" name="content-frame" style="width: 100%; height: 500px; border: none;"></iframe>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <h2>CONNECT WITH US</h2>
            <hr>
            <div class="contact-info">
                <span class="contact-item"><img src="imgs/call.PNG" alt="Phone"> 250789294965</span>
                <span class="contact-item"><img src="imgs/instagram.PNG" alt="Instagram"> techconnect</span>
                <span class="contact-item"><img src="imgs/git.PNG" alt="GitHub"> techconnect250</span>
                <span class="contact-item"><img src="imgs/facebook.PNG" alt="Facebook"> techconnect Rwanda</span>
                <span class="contact-item"><img src="imgs/TEC.PNG" alt="LinkedIn"> techconnect Rwanda</span>
                <span class="contact-item"><img src="imgs/Mail.PNG" alt="Email"> techconnect@gmail.com</span>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 TechConnect. All rights reserved By Btech IT.</p>
            </div>
        </div>
    </footer>
    <script>
        function setActive(link) {
            var links = document.querySelectorAll('nav ul li a');
            links.forEach(function(l) {
                l.classList.remove('active');
            });
            link.classList.add('active');
        }

        function showAlert(message) {
            alert('You clicked on: ' + message);
        }

        function logout() {
            alert('You have been logged out.');
            // Redirect to login page or handle logout functionality here
        }

        // Example of making the page content dynamically adjustable
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                document.querySelector('.sidebar').style.width = '100%';
            } else {
                document.querySelector('.sidebar').style.width = '250px';
            }
        });

        // Initial check
        if (window.innerWidth <= 768) {
            document.querySelector('.sidebar').style.width = '100%';
        } else {
            document.querySelector('.sidebar').style.width = '250px';
        }
    </script>
</body>
</html>
