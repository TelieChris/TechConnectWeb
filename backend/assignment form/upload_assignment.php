<?php
if (!empty($_POST["upload_assignment"])) { 
    require_once("db.php");

    // Fetch the course_id
    $course_id = $_POST['course_id'];

    // Handle the file upload
    if (isset($_FILES['assignment_file']) && $_FILES['assignment_file']['error'] == 0) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['assignment_file']['name']);
        $upload_file = $upload_dir . $file_name;

        // Ensure the upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move the file to the upload directory
        if (move_uploaded_file($_FILES['assignment_file']['tmp_name'], $upload_file)) {
            // Prepare the SQL statement to insert the assignment record
            $sql = "INSERT INTO student_assignments (course_id, file_url) VALUES (:course_id, :file_url)";
            $pdo_statement = $pdo_conn->prepare($sql);
            
            // Execute the statement with the file URL
            $result = $pdo_statement->execute(array(
                ':course_id' => $course_id,
                ':file_url' => $upload_file
            ));
            
            // Redirect on success
            if (!empty($result)) {
                header('Location: stude_index.php','Location: stud_index.php');
            } else {
                echo "Failed to save assignment record.";
            }
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}
?>
