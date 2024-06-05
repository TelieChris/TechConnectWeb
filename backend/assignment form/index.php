<?php
require_once("db.php");
?>
<html>
<head>
<title>PHP PDO CRUD</title>
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
	$pdo_statement = $pdo_conn->prepare("SELECT * FROM courses ORDER BY id DESC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div style="text-align:right;margin:20px 0px;"><a href="add.php" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Create</a></div>
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header" width="20%">course_id</th>
	  <th class="table-header" width="20%">Title</th>
	  <th class="table-header" width="40%">Description</th>
	  <th class="table-header" width="20%">	due_date</th>
	  <th class="table-header" width="20%">	file_url</th>
	  <th class="table-header" width="5%">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["course_id"]; ?></td>
		<td><?php echo $row["title"]; ?></td>
		<td><?php echo $row["description"]; ?></td>
		<td><?php echo $row["due_date"]; ?></td> 
		<td><?php echo $row["file_url"]; ?></td>
		<td><a class="ajax-action-links" href='edit.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/edit.png" title="Edit" /></a> <a class="ajax-action-links" href='delete.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/delete.png" title="Delete" /></a></td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
</body>
</html>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Assignment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Assignment</h2>
        <form>
            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="number" class="form-control" id="course_id" name="course_id" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
            </div>
            <div class="form-group">
                <label for="file_url">File URL</label>
                <input type="text" class="form-control" id="file_url" name="file_url">
            </div>
            <button type="submit" class="btn btn-primary">Create Assignment</button>
        </form>
    </div>
</body>
</html>