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
        .ajax-action-links { margin-right: 10px; }
    </style>
</head>
<body>
    <div style="text-align:right;margin:20px 0px;">
        <a href="submit.php" class="button_link">
            <img src="crud-icon/add.png" title="View All Submitted Assignments" style="vertical-align:bottom;" /> Submit a New Assignments
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="submit_index.php" class="button_link">
            <img src="crud-icon/add.png" title="Create New Assignment" style="vertical-align:bottom;" /> Back to Student's page
        </a>
    </div>
    <table class="tbl-qa">
        <thead>
            <tr>
                <th class="table-header" width="5%">Submission_ID</th>
                <th class="table-header" width="30%">Assignment_ID</th>
                <th class="table-header" width="35%">Student_id</th>
                <th class="table-header" width="15%">Submission_date</th>
                <th class="table-header" width="15%">File</th>
                <th class="table-header" width="15%">Grade</th>
                <th class="table-header" width="10%">Actions</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $pdo_statement = $pdo_conn->prepare("SELECT * FROM submissions ORDER BY submission_id DESC");
            $pdo_statement->execute();
            $result = $pdo_statement->fetchAll();

            if (!empty($result)) {
                foreach ($result as $row) {
                    ?>
                    <tr class="table-row">
                        <td><?php echo htmlspecialchars($row["submission_id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["assignment_id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["student_id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["submission_date"]); ?></td>
                        <td><?php echo htmlspecialchars($row["file_url"]); ?></td>
                        <td><?php echo htmlspecialchars($row["grade"]); ?></td>
                        <td><a href="<?php echo htmlspecialchars($row["file_url"]); ?>" download>Download</a></td>
                        
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr class="table-row">
                    <td colspan="6">No records found.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
