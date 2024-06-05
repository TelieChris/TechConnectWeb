<?php
require_once("db.php");
if(!empty($_POST["save_record"])) {
	$pdo_statement=$pdo_conn->prepare("update courses set 	course_id='" . $_POST[ '	course_id' ] . "', title='" . $_POST[ 'title' ]. "', description='" . $_POST[ 'description' ]. "', due_date='" . $_POST[ 'due_date' ]. "', file_url='" . $_POST[ 'file_url' ]. "' where id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$pdo_statement = $pdo_conn->prepare("SELECT * FROM courses where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll(); 
?>
<html>
<head>
<title>PHP PDO CRUD - Edit Record</title>
<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.frm-add {border: #c3bebe 1px solid;
    padding: 30px;}
.demo-form-heading {margin-top:0px;font-weight: 500;}	
.demo-form-row{margin-top:20px;}
.demo-form-field{width:300px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
</style>
</head>
<body>
<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Edit Record</h1>
<form name="frmAdd" action="" method="POST">
  <div class="demo-form-row">
	  <label>Course_id: </label><br>
	  <input type="text" name="course_id" class="demo-form-field" value="<?php echo $result[0]['course_id']; ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Title: </label><br>
	  <input type="text" name="title" class="demo-form-field" value="<?php echo $result[0]['title']; ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Description: </label><br>
	  <textarea name="description" class="demo-form-field" rows="5" required ><?php echo $result[0]['description']; ?></textarea>
  </div>
  <div class="demo-form-row">
	  <label>Due_date: </label><br>
	  <input type="date" name="due_date" class="demo-form-field" value="<?php echo $result[0]['due_date']; ?>" required />
  </div>
  <div class="demo-form-row">
	  <label>File_url: </label><br>
	  <input type="text" name="file_url" class="demo-form-field" value="<?php echo $result[0]['file_url']; ?>" required />
  </div>
  <div class="demo-form-row">
	  <input name="save_record" type="submit" value="Save" class="demo-form-submit">
  </div>
  </form>
</div>
</body>
</html>