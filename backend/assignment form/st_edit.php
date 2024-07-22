<?php
require_once("db.php");

// Ensure the 'id' parameter is present and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Fetch the record to edit
    $pdo_statement = $pdo_conn->prepare("SELECT * FROM student_assignments WHERE id = :id");
    $pdo_statement->execute([':id' => $id]);
    $result = $pdo_statement->fetchAll();

    // Check if record exists
    if (empty($result)) {
        echo "Record not found.";
        exit;
    }

    if (!empty($_POST["save_record"])) {
        // Prepare the SQL statement with placeholders
        $pdo_statement = $pdo_conn->prepare("UPDATE student_assignments SET course_id = :course_id, file_url = :file_url, uploaded_at = :uploaded_at WHERE id = :id");
        
        // Execute the statement with bound parameters
        $result = $pdo_statement->execute([
            ':course_id' => $_POST['course_id'],
            ':file_url' => $_POST['file_url'],
            ':uploaded_at' => $_POST['uploaded_at'],
            ':id' => $id
        ]);
        
        if ($result) {
            header('Location: stude_index.php');
            exit;
        } else {
            echo "Failed to update record.";
        }
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP PDO CRUD - Edit Record</title>
    <style>
        body { width: 615px; font-family: Arial, sans-serif; letter-spacing: 1px; line-height: 20px; }
        .button_link { color: #FFF; text-decoration: none; background-color: #428a8e; padding: 10px; }
        .frm-add { border: #c3bebe 1px solid; padding: 30px; }
        .demo-form-heading { margin-top: 0px; font-weight: 500; }    
        .demo-form-row { margin-top: 20px; }
        .demo-form-field { width: 300px; padding: 10px; }
        .demo-form-submit { color: #FFF; background-color: #414444; padding: 10px 50px; border: 0px; cursor: pointer; }
    </style>
</head>
<body>
    <div style="margin: 20px 0px; text-align: right;">
        <a href="stude_index.php" class="button_link">Back to List</a>
    </div>
    <div class="frm-add">
        <h1 class="demo-form-heading">Edit Record</h1>
        <form name="frmAdd" action="" method="POST">
            <div class="demo-form-row">
                <label>Course Name: </label><br>
                <textarea name="course_id" class="demo-form-field" rows="5" required><?php echo htmlspecialchars($result[0]['course_id']); ?></textarea>
            </div>
            <div class="demo-form-row">
                <label>File Name: </label><br>
                <textarea name="file_url" class="demo-form-field" rows="5" required><?php echo htmlspecialchars($result[0]['file_url']); ?></textarea>
            </div>
            <div class="demo-form-row">
                <label>Uploaded At: </label><br>
                <input type="text" name="uploaded_at" class="demo-form-field" value="<?php echo htmlspecialchars($result[0]['uploaded_at']); ?>" required />
            </div>
            <div class="demo-form-row">
                <input name="save_record" type="submit" value="Save" class="demo-form-submit">
            </div>
        </form>
    </div>
</body>
</html>
