<?php
include 'db.php';

$sql = "SELECT * FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Title</th><th>Content</th><th>Author ID</th><th>Published At</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["news_id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["content"]. "</td><td>" . $row["author_id"]. "</td><td>" . $row["published_at"]. "</td>";
        echo "<td><a href='update_news.php?id=".$row["news_id"]."'>Edit</a> | <a href='delete_news.php?id=".$row["news_id"]."'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
