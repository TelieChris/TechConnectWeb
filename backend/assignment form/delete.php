<?php
require_once("db.php");
$pdo_statement=$pdo_conn->prepare("delete from assignments where assignment_id=" . $_GET['assignment_id']);
$pdo_statement->execute();
header('location:index.php');
?>