<?php
require_once("db.php");

// Ensure the 'course_id' parameter is present and is a valid integer
if (isset($_GET['course_id']) && is_numeric($_GET['course_id'])) {
    $course_id = (int)$_GET['course_id'];

    try {
        // Prepare the SQL statement with a placeholder
        $pdo_statement = $pdo_conn->prepare("DELETE FROM student_assignments WHERE course_id = :course_id");
        
        // Bind the parameter
        $pdo_statement->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        
        // Execute the statement
        $pdo_statement->execute();
        
        // Redirect and stop the script
        header('Location: stude_index.php');
        exit();
    } catch (PDOException $e) {
        // Handle any errors
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid course ID.";
}
?>
