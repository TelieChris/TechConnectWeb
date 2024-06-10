<?php
include 'db.php';

// Define how many results you want per page
$results_per_page = 10;

// Find out the number of results stored in the database
$sql = "SELECT COUNT(post_id) AS total FROM posts";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_results = $row['total'];

// Determine number of total pages available
$total_pages = ceil($total_results / $results_per_page);

// Determine which page number visitor is currently on
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;

// Determine the sql LIMIT starting number for the results on the displaying page
$start_from = ($page - 1) * $results_per_page;

// Retrieve selected results from database and display them on page
$sql = "SELECT post_id, forum_id, user_id, content, created_at FROM posts LIMIT $start_from, $results_per_page";
$result = $conn->query($sql);
$i11 = $start_from + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="container">
    <h2 class="alert alert-primary">Posts</h2>
    <a class="btn btn-primary" href="create_post.php">Create new</a>
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Forum ID</th>
                        <th>User ID</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
               
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>
                    <td>$i11</td>
                    <td>{$row['forum_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['content']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <a class='btn btn-primary' href='update_post.php?post_id={$row['post_id']}' onclick='return confirm(\"Do you want to update data?\")'>Edit</a>
                        <a class='btn btn-danger' href='delete_post.php?post_id={$row['post_id']}' onclick='return confirm(\"Do you want to delete data?\")'>Delete</a>
                    </td>
                  </tr>";
                  $i11++;
        }
        echo "</tbody></table>";

        // Display the pagination links with Previous and Next buttons
        echo '<nav><ul class="pagination">';
        echo '<li class="page-item"><a class="page-link" href="#" id="prev">Previous</a></li>';
        for ($p = 1; $p <= $total_pages; $p++) {
            echo '<li class="page-item"><a class="page-link" href="posts.php?page=' . $p . '">' . $p . '</a></li>';
        }
        echo '<li class="page-item"><a class="page-link" href="#" id="next">Next</a></li>';
        echo '</ul></nav>';
    } else {
        echo "<div class='alert alert-warning'>No results found.</div>";
    }
   
    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery for Previous and Next buttons -->
<script>
$(document).ready(function() {
    var currentPage = <?php echo $page; ?>;
    var totalPages = <?php echo $total_pages; ?>;

    $('#prev').click(function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            window.location.href = 'posts.php?page=' + currentPage;
        }
    });

    $('#next').click(function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            window.location.href = 'posts.php?page=' + currentPage;
        }
    });
});
</script>
</body>
</html>
