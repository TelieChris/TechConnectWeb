<?php
require_once("db.php");
?>
<html>
<head>
<title>Assignments Page</title>
<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
</style>
</head>
<body>
<?php	
	$pdo_statement = $pdo_conn->prepare("SELECT * FROM assignments ORDER BY assignment_id DESC"); 
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div style="text-align:right;margin:20px 0px;"><a href="add.php" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Create</a></div>
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header" width="40%">assignment_id</th>
      
	  <th class="table-header" width="40%">Title</th>
	  <th class="table-header" width="40%">Description</th>
	  <th class="table-header" width="20%">Due_date</th>
	  <th class="table-header" width="5%">File_url</th>
	  <th class="table-header" width="5%">Action</th>
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
            <td><?php echo htmlspecialchars($row["title"]); ?></td>
            <td><?php echo htmlspecialchars($row["description"]); ?></td>
            <td><?php echo htmlspecialchars($row["due_date"]); ?></td>
            <td><?php echo htmlspecialchars($row["file_url"]); ?></td>
            <td>
                <a class="ajax-action-links" href='edit.php?assignment_id=<?php echo htmlspecialchars($row['assignment_id']); ?>'>
                    <img src="crud-icon/edit.png" title="Edit" />
                </a>
                <a class="ajax-action-links" href='delete.php?assignment_id=<?php echo htmlspecialchars($row['assignment_id']); ?>'>
                    <img src="crud-icon/delete.png" title="Delete" />
                </a>
            </td>
        </tr>
<?php
    }
}
?>

  </tbody>
</table>
</body>
</html>