<?php
require_once("db.php");

if (!empty($_POST["save_record"])) {
    $pdo_statement = $pdo_conn->prepare("UPDATE submissions SET assignment_id = :assignment_id, student_id = :student_id, submission_date = :submission_date, file_url = :file_url, grade = :grade WHERE submission_id = :submission_id");
    $result = $pdo_statement->execute([
        ':submission_id' => $_POST['submission_id'],
        ':assignment_id' => $_POST['assignment_id'],
        ':student_id' => $_POST['student_id'],
        ':submission_date' => $_POST['submission_date'],
        ':file_url' => $_POST['file_url'],
        ':grade' => $_POST['grade']
    ]);
    if ($result) {
        header('Location: stud_index.php');
        exit;
    } else {
        echo "Error updating record.";
    }
}

if (!empty($_GET['submission_id'])) {
    $pdo_statement = $pdo_conn->prepare("SELECT * FROM submissions WHERE submission_id = :submission_id");
    $pdo_statement->execute([':submission_id' => $_GET['submission_id']]);
    $result = $pdo_statement->fetchAll();
    
    if (count($result) > 0) {
        $assignment = $result[0];
    } else {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
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
        <a href="submit_index.php" class="button_link">Back to List</a>
    </div>
    <div class="frm-add">
        <h1 class="demo-form-heading">Edit Record</h1>
        <form name="frmAdd" action="" method="POST">
            <input type="hidden" name="submission_id" value="<?php echo htmlspecialchars($assignment['submission_id']); ?>" />
            <div class="demo-form-row">
                <label>Assignment ID: </label><br>
                <input type="number" name="assignment_id" class="demo-form-field" value="<?php echo htmlspecialchars($assignment['assignment_id']); ?>" required />
            </div>
            <div class="demo-form-row">
                <label>Student ID: </label><br>
                <input type="number" name="student_id" class="demo-form-field" value="<?php echo htmlspecialchars($assignment['student_id']); ?>" required />
            </div>
            <div class="demo-form-row">
                <label>Submission Date: </label><br>
                <input type="date" name="submission_date" class="demo-form-field" value="<?php echo htmlspecialchars($assignment['submission_date']); ?>" required />
            </div>
            <div class="demo-form-row">
                <label>File URL: </label><br>
                <input type="text" name="file_url" class="demo-form-field" value="<?php echo htmlspecialchars($assignment['file_url']); ?>" required />
            </div>
            <div class="demo-form-row">
                <label>Grade: </label><br>
                <input type="text" name="grade" class="demo-form-field" value="<?php echo htmlspecialchars($assignment['grade']); ?>" required />
            </div>
            <div class="demo-form-row">
                <input name="save_record" type="submit" value="Save" class="demo-form-submit">
            </div>
        </form>
    </div>
</body>
</html>
