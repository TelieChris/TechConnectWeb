<?php
require_once("db.php");
?>
<html>
<head>
<title>PHP PDO CRUD</title>
<style>
body { width: 615px; font-family: arial; letter-spacing: 1px; line-height: 20px; }
.tbl-qa { width: 100%; font-size: 0.9em; background-color: #f5f5f5; }
.tbl-qa th.table-header { padding: 5px; text-align: left; padding: 10px; }
.tbl-qa .table-row td { padding: 10px; background-color: #FDFDFD; vertical-align: top; }
.button_link { color: #FFF; text-decoration: none; background-color: #428a8e; padding: 8px 12px; border-radius: 5px; }
</style>
</head>
<body>
<?php
$pdo_statement = $pdo_conn->prepare("SELECT * FROM assignments ORDER BY assignment_id DESC");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>

               

<div style="text-align:right;margin:20px 0px;">
    <video autoplay muted loop id="videoBG" style="width: 800%px; height: 200px;">
  <source src="E learning.mp4" type="video/mp4">

</video> <br><br>
<a href="stude_index.php" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> View All Submitted Assignments</a>
<a href="ass_student.html" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Submit a New Assignment</a>
</div>
<table class="tbl-qa">
    <thead>
        <tr>
            <th class="table-header" width="5%">ID</th>
            <th class="table-header" width="30%">Title</th>
            <th class="table-header" width="35%">Description</th>
            <th class="table-header" width="15%">Due Date</th>
            <th class="table-header" width="10%">File URL</th>
           
            
        </tr>
        
    
    </thead>
    
    <tbody id="table-body">
<?php
if (!empty($result)) {
    foreach ($result as $row) {
?>
        <tr class="table-row">
            <td><?php echo htmlspecialchars($row["assignment_id"]); ?></td>
            <td><?php echo htmlspecialchars($row["title"]); ?></td>
            <td><?php echo htmlspecialchars($row["description"]); ?></td>
            <td><?php echo htmlspecialchars($row["due_date"]); ?></td>
            <td>
                <?php if (!empty($row["file_url"])) { ?>
                    <a href="<?php echo htmlspecialchars($row["file_url"]); ?>" target="_blank"><?php echo htmlspecialchars($row["file_url"]); ?></a>
                <?php } else { ?>
                    N/A
                <?php } ?>
            </td>
            
            <td>
                <?php if (!empty($row["attachment"])) { ?>
                    <form action="<?php echo htmlspecialchars($row["attachment"]); ?>" method="post" target="_blank">
                        <button type="submit" class="button_link">Open a Link</button>
                    </form>
                <?php } ?>
            </td>
        </tr>
<?php
    }
} else {
?>
        <tr class="table-row">
            <td colspan="7">No records found.</td>
        </tr>
<?php
}
?>
    </tbody>
</table>
</body>
</html>
