<?php
require_once("db.php");

// Check if the submission_id is set in the URL
if (isset($_GET["submission_id"])) {
    $submission_id = $_GET["submission_id"];
} else {
    die("Error: submission_id is not provided.");
}

// Update the submission if the form is submitted
if (!empty($_POST["submit"])) {
    $sql = "UPDATE submissions SET assignment_id = :assignment_id, student_id = :student_id, submission_date = :submission_date, file_url = :file_url, grade = :grade WHERE submission_id = :submission_id";
    $pdo_statement = $pdo_conn->prepare($sql);

    $result = $pdo_statement->execute(array(
        ':assignment_id' => $_POST['assignment_id'],
        ':student_id' => $_POST['student_id'],
        ':submission_date' => $_POST['submission_date'],
        ':file_url' => $_POST['file_url'],
        ':grade' => $_POST['grade'],
        ':submission_id' => $_POST['submission_id']
    ));
    if (!empty($result)) {
        header('location:submit_index.php');
        exit();
    }
}

// Retrieve the submission details
$pdo_statement = $pdo_conn->prepare("SELECT * FROM submissions WHERE submission_id = ?");
$pdo_statement->execute([$submission_id]);
$result = $pdo_statement->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    die("Error: No submission found with the provided submission_id.");
}
?>
<html>
<head>
    <title>Edit Submission</title>
    <style>
        body { width: 615px; font-family: arial; letter-spacing: 1px; line-height: 20px; }
        .tbl-qa { width: 100%; font-size: 0.9em; background-color: #f5f5f5; }
        .tbl-qa th.table-header { padding: 5px; text-align: left; padding: 10px; }
        .tbl-qa .table-row td { padding: 10px; background-color: #FDFDFD; vertical-align: top; }
        .button_link { color: #FFF; text-decoration: none; background-color: #428a8e; padding: 8px 12px; border-radius: 5px; }
        .ajax-action-links { margin-right: 10px; }
    </style>
</head>
<body>
    <form name="frmAdd" action="submit_edit.php?submission_id=<?php echo htmlspecialchars($submission_id); ?>" method="POST">
        <div style="text-align:right;margin:20px 0px;">
            <a href="submit_index.php" class="button_link">
                <img src="crud-icon/add.png" title="View All Submitted Assignments" style="vertical-align:bottom;" /> View All Submitted Assignments
            </a>
        </div>
        <table class="tbl-qa">
            <thead>
                <tr>
                    <th class="table-header" colspan="2">Edit Submission</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-row">
                    <td>Assignment ID</td>
                    <td><input type="text" name="assignment_id" class="form-control" value="<?php echo htmlspecialchars($result['assignment_id']); ?>" required></td>
                </tr>
                <tr class="table-row">
                    <td>Student ID</td>
                    <td><input type="text" name="student_id" class="form-control" value="<?php echo htmlspecialchars($result['student_id']); ?>" required></td>
                </tr>
                <tr class="table-row">
                    <td>Submission Date</td>
                    <td><input type="date" name="submission_date" class="form-control" value="<?php echo htmlspecialchars($result['submission_date']); ?>" required></td>
                </tr>
                <tr class="table-row">
                    <td>File URL</td>
                    <td><input type="text" name="file_url" class="form-control" value="<?php echo htmlspecialchars($result['file_url']); ?>" required></td>
                </tr>
                <tr class="table-row">
                    <td>Grade</td>
                    <td><input type="text" name="grade" class="form-control" value="<?php echo htmlspecialchars($result['grade']); ?>" required></td>
                </tr>
                <tr class="table-row">
                    <td colspan="2">
                        <input type="hidden" name="submission_id" value="<?php echo htmlspecialchars($result['submission_id']); ?>">
                        <button type="submit" name="submit" class="button_link" style="background-color: #4CAF50; border: none; color: white; padding: 8px 12px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer;">Update Record</button>

                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
