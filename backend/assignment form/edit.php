<?php
require_once("db.php");

if (!empty($_POST["save_record"])) {
    $pdo_statement = $pdo_conn->prepare("UPDATE assignments SET title = :title, description = :description,  due_date = :due_date, file_url = :file_url WHERE assignment_id = :assignment_id");
    $result = $pdo_statement->execute([
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':due_date' => $_POST['due_date'],
        ':file_url' => $_POST['file_url'],
        ':assignment_id' => $_GET['assignment_id']
    ]);
    if ($result) {
        header('Location: index.php');
        exit;
    }
}

$pdo_statement = $pdo_conn->prepare("SELECT * FROM assignments WHERE assignment_id = :assignment_id");
$pdo_statement->execute([':assignment_id' => $_GET['assignment_id']]);
$result = $pdo_statement->fetchAll();
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
        <a href="index.php" class="button_link">Back to List</a>
    </div> 
    <div class="frm-add">
        <h1 class="demo-form-heading">Edit Record</h1>
        <form name="frmAdd" action="" method="POST">
            
            <div class="demo-form-row">
                <label>Title: </label><br>
                <textarea name="title" class="demo-form-field" rows="5" required><?php echo htmlspecialchars($result[0]['description']); ?></textarea>
            </div>
            <div class="demo-form-row">
                <label>Description: </label><br>
                <textarea name="description" class="demo-form-field" rows="5" required><?php echo htmlspecialchars($result[0]['description']); ?></textarea>
            </div>
            <div class="demo-form-row">
                <label>Due Date: </label><br>
                <input type="text" name="due_date" class="demo-form-field" value="<?php echo htmlspecialchars($result[0]['due_date']); ?>" required />
            </div>
            <div class="demo-form-row">
                <label>File URL: </label><br>
                <input type="text" name="file_url" class="demo-form-field" value="<?php echo htmlspecialchars($result[0]['file_url']); ?>" required />
            </div>
            <div class="demo-form-row">
                <input name="save_record" type="submit" value="Save" class="demo-form-submit">
            </div>
        </form>
    </div>
</body>
</html>
