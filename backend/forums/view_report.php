<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Records</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        $host = 'sql12.freesqldatabase.com';
        $dbname = 'sql12716221';
        $user = 'sql12716221';
        $pass = 'FfJUdVvA73';
        $port = 3306;

        // Create connection
        $conn = new mysqli($host, $user, $pass, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<i class="fas fa-exclamation-circle"></i> Connection failed: ' . $conn->connect_error;
            echo '</div>';
            die();
        }

        $sql = "SELECT * FROM forums";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<i class="fas fa-check-circle p-3 text-dark"></i> AVAILABLE FORUMS INFORMATIONS.';
            echo ' <a href="create_forum.php" class="btn btn-success btn-m"><i class="fas fa-plus"></i> Create Forum</a>';
            echo '</div>';
            echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Forum ID</th><th>Course ID</th><th>Title</th><th>Description</th><th>Created By</th><th>Created At</th><th>Actions</th></tr></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["forum_id"]. "</td><td>" . $row["course_id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["created_by"]. "</td><td>" . $row["created_at"]. "</td><td><a href='updateforum.php?forum_id=" . $row["forum_id"]. "' class='btn btn-warning btn-m'><i class='fas fa-edit'></i></a> <a href='delete.php?forum_id=" . $row["forum_id"]. "' class='btn btn-danger btn-m'><i class='fas fa-trash'></i></a></td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo '<div class="alert alert-info" role="alert">';
            echo '<i class="fas fa-info-circle"></i> 0 results';
            echo '</div>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
