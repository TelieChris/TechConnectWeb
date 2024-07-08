<?php
require_once("db.php");
?>
<html>
<head>
<title>Assignments</title>
<style>
body { width: 615px; font-family: arial; letter-spacing: 1px; line-height: 20px; }
.tbl-qa { width: 100%; font-size: 0.9em; background-color: #f5f5f5; }
.tbl-qa th.table-header { padding: 5px; text-align: left; padding: 10px; }
.tbl-qa .table-row td { padding: 10px; background-color: #FDFDFD; vertical-align: top; }
.button_link { color: #FFF; text-decoration: none; background-color: #428a8e; padding: 10px; }
</style>
</head>
<body>
    <h1><i>All Submitted Asignments</i></h1>
<?php   
$pdo_statement = $pdo_conn->prepare("SELECT * FROM student_assignments ORDER BY id DESC"); 
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<div style="text-align:right; margin:20px 0px;">
    <a href="index.php" class="button_link">
        <img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Back to teacher's page
    </a>
</div>
<table class="tbl-qa">
  <thead>
    <tr>
      <th class="table-header" width="10%">ID</th>
      <th class="table-header" width="30%">Course ID</th>
      <th class="table-header" width="30%">File Name</th>
      <th class="table-header" width="20%">Uploaded At</th>
      <th class="table-header" width="10%">Download</th>
    </tr>
  </thead>
  <tbody id="table-body">
<?php
if (!empty($result)) {
    $a12 = 1;
    foreach ($result as $row) {
?>
    <tr class="table-row">
        <td><?php echo $a12++; ?></td>
        <td><?php echo htmlspecialchars($row["course_id"]); ?></td>
        <td><?php echo htmlspecialchars(basename($row["file_url"])); ?></td>
        <td><?php echo htmlspecialchars($row["uploaded_at"]); ?></td>
        <td><a href="<?php echo htmlspecialchars($row["file_url"]); ?>" download>Download</a></td>
    </tr>
<?php
    }
}
?>
  </tbody>
</table>
</body>
</html>
