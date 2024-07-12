<?php
$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12716221';
$user = 'sql12716221';
$pass = 'FfJUdVvA73';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$faculties = [];

$sql_faculties = "SELECT * FROM faculty";

if ($result = $conn->query($sql_faculties)) {
    while ($row = $result->fetch_assoc()) {
        $faculties[] = $row;
    }
    $result->free();
}

$conn->close();

function getInitials($name) {
    $words = explode(" ", $name);
    $initials = "";
    foreach ($words as $word) {
        $initials .= strtoupper($word[0]);
    }
    return $initials;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Information - TechConnect</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #00173D;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        .faculty-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .faculty-initials {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #00173D;
            color: white;
            font-size: 2em;
            font-weight: bold;
        }

        .faculty-info {
            flex: 1;
        }

        .faculty-title {
            font-size: 1.2em;
            font-weight: bold;
        }

        .faculty-description {
            margin: 10px 0;
        }

        .faculty-lecturer {
            font-weight: bold;
        }

.navbar-brand {
  font-weight: bold;
}

.main-section {
  background-image: url('/imgs/home.jpg');
  background-size: cover;
  color: white;
}

.container .lead {
  color: white;
}

.btn-primary, .btn-secondary {
  padding: 10px 20px;
}

footer {
  position: relative;
  bottom: 0;
  width: 100%;
}

footer p {
  margin: 0;
}

span img {
  width: 20px;
  height: 20px;
  margin-right: 5px;
  color:white;
}

    </style>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00173D;">
    <a class="navbar-brand" href="#" style="padding-left: 10px; font-size: 32px;">TechConnect</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../../index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="frontend/pages/login.php">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="frontend/pages/login.php">Assignment</a></li>
        <li class="nav-item"><a class="nav-link" href="frontend/pages/login.php">Students</a></li>
        <li class="nav-item"><a class="nav-link" href="frontend/pages/facultyinfo.php">Faculty Info</a></li>
        <li class="nav-item"><a class="nav-link" href="frontend/pages/login.php">Forum</a></li>
        <li class="nav-item"><a class="nav-link" href="frontend/pages/login.php">News</a></li>
      </ul>
    </div>
  </nav>
    <div class="container">
        <?php foreach ($faculties as $faculty): ?>
            <div class="faculty-card">
                <div class="faculty-initials"><?php echo htmlspecialchars(getInitials($faculty['name'])); ?></div>
                <div class="faculty-info">
                    <div class="faculty-title"><?php echo htmlspecialchars($faculty['name']); ?></div>
                    <div class="faculty-description"><?php echo htmlspecialchars($faculty['description']); ?></div>
                    <div class="faculty-lecturer">
                        Head of Department: <?php echo htmlspecialchars($faculty['head_of_faculty']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <footer class="text-white text-center py-3" style="background-color: #00173D;">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>CONNECT WITH US</p><!-- Title -->
          <hr style="background-color: aliceblue;">
          <p>
            <span class="contact-item"><img src="../imgs/call.png" alt="Phone"> 250789294965</span>
            <span class="contact-item"><img src="../imgs/instagram.png" alt="Instagram"> techconnect</span>
            <span class="contact-item"><img src="../imgs/git.png" alt="GitHub"> techconnect250</span>
            <span class="contact-item"><img src="../imgs/facebook.png" alt="Facebook"> techconnect Rwanda</span>
            <span class="contact-item"><img src="../imgs/TEC.png" alt="LinkedIn"> techconnect Rwanda</span>
            <span class="contact-item"><img src="../imgs/Mail.png" alt="Email"> techconnect@gmail.com</span>
          </p><br>
          <p>&copy; 2024 TechConnect. All right reserved By Btech IT.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
