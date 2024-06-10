<?php
include 'db.php';

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Delete comments associated with the post first
    $sql_delete_comments = "DELETE FROM comments WHERE post_id=?";
    $stmt_delete_comments = $conn->prepare($sql_delete_comments);
    $stmt_delete_comments->bind_param("i", $post_id);

    if ($stmt_delete_comments->execute()) {
        // Comments deleted successfully, proceed with deleting the post
        $sql_delete_post = "DELETE FROM posts WHERE post_id=?";
        $stmt_delete_post = $conn->prepare($sql_delete_post);
        $stmt_delete_post->bind_param("i", $post_id);

        if ($stmt_delete_post->execute()) {
            // Post and associated comments deleted successfully
            $stmt_delete_post->close();
            $stmt_delete_comments->close();
            $conn->close();
            header("Location: read_posts.php");
            exit();
        } else {
            echo "Error deleting post: " . $sql_delete_post . "<br>" . $conn->error;
        }
    } else {
        echo "Error deleting comments: " . $sql_delete_comments . "<br>" . $conn->error;
    }

    $stmt_delete_comments->close();
    $conn->close();
}
?>
