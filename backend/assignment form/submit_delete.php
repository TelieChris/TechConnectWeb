<?php
require_once("db.php");

if (isset($_GET['submission_id'])) {
    $submission_id = $_GET['submission_id'];

    // Prepare the SQL statement
    $pdo_statement = $pdo_conn->prepare("DELETE FROM submissions WHERE submission_id = :submission_id");
    
    // Bind the parameter
    $pdo_statement->bindParam(':submission_id', $submission_id, PDO::PARAM_INT);

    // Execute the statement
    if ($pdo_statement->execute()) {
        // Redirect on success
        header('Location: submit_index.php');
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "Invalid request. Submission ID is missing.";
}
?>

