<?php
include 'db_connection.php';

// Define how many results you want per page
$results_per_page = 5;

// Find out the number of results stored in the database
$sql = "SELECT COUNT(news_id) AS total FROM news";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_results = $row['total'];

// Determine the total number of pages available
$total_pages = ceil($total_results / $results_per_page);

// Determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Determine the starting limit number
$start_from = ($page-1) * $results_per_page;

// Retrieve the selected results from the database
$sql = "SELECT * FROM news LIMIT $start_from, $results_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="alert alert-primary p-3 text-center">News Articles Views</h2>
        <a href="create_news.php" class="btn btn-primary mb-3">Create News Article</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author ID</th>
                    <th>Published At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i12 = $start_from + 1;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>$i12</td>
                            <td>{$row['title']}</td>
                            <td>{$row['content']}</td>
                            <td>{$row['author_id']}</td>
                            <td>{$row['published_at']}</td>
                            <td>
                                <a href='update_news.php?id={$row['news_id']}' class='btn btn-warning'>Edit</a>
                                <a href='delete_news.php?id={$row['news_id']}' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                        $i12++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No articles found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <?php if ($page > 1): ?>
                <a href="dashIndex.php?page=<?php echo $page-1; ?>" class="btn btn-secondary">Previous</a>
            <?php endif; ?>
            <?php if ($page < $total_pages): ?>
                <a href="dashIndex.php?page=<?php echo $page+1; ?>" class="btn btn-secondary ml-auto">Next</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
