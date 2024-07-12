<?php
if (!empty($_POST["add_record"])) { 
    require_once("db.php");

    // Handle file upload
    if (isset($_FILES['file_url']) && $_FILES['file_url']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = '';
        $uploaded_file = $upload_dir . basename($_FILES['file_url']['name']);

        if (move_uploaded_file($_FILES['file_url']['tmp_name'], $uploaded_file)) {
            $file_url = $uploaded_file;
        } else {
            // Handle error
            echo "Error uploading file.";
            exit;
        }
    } else {
        echo "No file uploaded or there was an upload error.";
        exit;
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO submissions (assignment_id, student_id, submission_date, file_url, grade) VALUES (:assignment_id, :student_id, :submission_date, :file_url, :grade)";
    $pdo_statement = $pdo_conn->prepare($sql);
    
    // Execute the statement with the form data
    $result = $pdo_statement->execute(array(
        ':assignment_id' => $_POST['assignment_id'],
        ':student_id' => $_POST['student_id'],
        ':submission_date' => $_POST['submission_date'],
        ':file_url' => $file_url,
        ':grade' => $_POST['grade']
    ));
    
    // Redirect on success
    if (!empty($result)) {
        header('Location: submit_index.php');
        exit();
    } else {
        echo "Failed to add record.";
    }
}
?>
