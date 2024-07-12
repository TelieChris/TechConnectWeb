<?php
if (!empty($_POST["add_record"])) { 
    require_once("db.php");

    // Prepare the SQL statement
    $sql = "INSERT INTO submissions (assignment_id, student_id, submission_date, file_url, grade) VALUES (:assignment_id, :student_id, :submission_date, :file_url, :grade)";
    $pdo_statement = $pdo_conn->prepare($sql);
    
    // Execute the statement with the form data
    $result = $pdo_statement->execute(array(
        ':assignment_id' => $_POST['assignment_id'],
        ':student_id' => $_POST['student_id'],
        ':submission_date' => $_POST['submission_date'],
        ':file_url' => $_POST['file_url'],
        ':grade' => $_POST['grade']
    ));
    
    // Redirect on success
    if (!empty($result)) {
        header('Location: stud_index.php');
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
<div style="margin: 20px 0px; text-align: right;">
<a href="submit_index.php" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> View All Submitted Assignments</a>
  &nbsp;&nbsp;&nbsp; <a href="submit_viewnewass.php" class="button_link">View All Posted Assignments</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Add New Record</h1>
<form name="frmUpload" action="upload_assignment.php" method="POST" enctype="multipart/form-data">

  <div class="form-group">
      <label for="assignment_id">Assignment</label>
      <select class="form-control" id="assignment_id" name="assignment_id" required>
          <option value="">Select assignment</option>
          <!-- Populate assignment options from the database -->
          <?php 
          require_once("db.php");
          $sql = "SELECT * FROM assignments";
          $result = $pdo_conn->query($sql);
          if ($result->rowCount() > 0) {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['assignment_id']}'>{$row['assignment_id']} - {$row['title']}</option>";
              }
          }
          ?>
      </select>
  </div>
  <div class="form-group">
      <label for="student_id">Student</label>
      <select class="form-control" id="student_id" name="student_id" required>
          <option value="">Select student</option>
          <!-- Populate student options from the database -->
          <?php
          require_once("db.php");
          $sql = "SELECT * FROM users";
          $result = $pdo_conn->query($sql);
          if ($result->rowCount() > 0) {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['user_id']}'>{$row['user_id']} - {$row['name']}</option>";
              }
          }
          ?>
      </select>
  </div>
  <div class="demo-form-row">
      <label>Submission Date: </label><br>
      <input type="date" name="submission_date" class="demo-form-field" required />
  </div>

  <div class="demo-form-row">
      <label>Assignment File: </label><br>
      <input type="file" name="file_url" class="demo-form-field" required />
  </div>

  <div class="demo-form-row">
    <label>Grade: </label><br>
    <input type="number" step="0.01" name="grade" class="demo-form-field" disabled />
</div>
     
  <div class="demo-form-row">
      <input name="add_record" type="submit" value="Add" class="demo-form-submit">
  </div>
</form>
</div> 
</body>
</html>

