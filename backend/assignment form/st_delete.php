<?php
require_once("db.php");
$pdo_statement=$pdo_conn->prepare("delete from student_assignments where id=" . $_GET['id']);
$pdo_statement->execute();
header('location:stude_index.php');
?>