<?php
if (!empty($_POST["add_record"])) { 
    require_once("db.php");

    // Prepare the SQL statement
    $sql = "INSERT INTO assignments (course_id, title, description, due_date, file_url) VALUES (:course_id, :title, :description, :due_date, :file_url)";
    $pdo_statement = $pdo_conn->prepare($sql);
    
    // Execute the statement
    $result = $pdo_statement->execute(array(
        ':course_id' => $_POST['course_id'],
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':due_date' => $_POST['due_date'],
        ':file_url' => $_POST['file_url']
    ));
    
    // Redirect on success
    if (!empty($result)) {
        header('Location: index.php');
    }
}
?>
<html>
<head>
<title>PHP PDO CRUD - Add New Record</title>
<style>
body {width: 615px; font-family: Arial; letter-spacing: 1px; line-height: 20px;}
.button_link {color: #FFF; text-decoration: none; background-color: #428a8e; padding: 10px;}
.frm-add {border: #c3bebe 1px solid; padding: 30px;}
.demo-form-heading {margin-top: 0px; font-weight: 500;} 
.demo-form-row {margin-top: 20px;}
.demo-form-field {width: 300px; padding: 10px;}
.demo-form-submit {color: #FFF; background-color: #414444; padding: 10px 50px; border: 0px; cursor: pointer;}
</style>
</head>
<body>
<div style="margin: 20px 0px; text-align: right;"><a href="index.php" class="button_link">Back to List</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Add New Record</h1>
<form name="frmAdd" action="" method="POST">
  <div class="form-group">
      <label for="course_id">Course Name</label>
      <select class="form-control" id="course_id" name="course_id" required>
          <option value="">Select course</option>
          <!-- Populate course options from the database -->
          <?php
          require_once("db.php");
          $sql = "SELECT * FROM courses";
          $result = $pdo_conn->query($sql);
          if ($result->rowCount() > 0) {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['course_id']}'>{$row['course_id']} - {$row['title']}</option>";
              }
          }
          ?>
      </select>
  </div>
  <div class="demo-form-row">
      <label>Title: </label><br>
      <textarea name="title" class="demo-form-field" rows="5" required></textarea>
  </div> 
  <div class="demo-form-row">
      <label>Description: </label><br>
      <textarea name="description" class="demo-form-field" rows="5" required></textarea>
  </div>
  <div class="demo-form-row">
      <label>Due Date: </label><br>
      <input type="date" name="due_date" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
      <label>File URL: </label><br> 
      <input type="url" name="file_url" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
      <input name="add_record" type="submit" value="Add" class="demo-form-submit">
  </div>
</form>
</div> 
</body>
</html>
