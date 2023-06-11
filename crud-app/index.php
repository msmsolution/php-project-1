<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PHP CRUD Project 1</title>
</head>
<body>
<div class="container">
    <table class="table table-dark table-bordered align-middle text-center">

        <thead>
        <tr class="align-middle">
            <td><a href="add.php">Add Student</a></td>
        </tr>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Registration Number</th>
            <th scope="col">Grade</th>
            <th scope="col">Classroom</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <?php
        $data = file_get_contents('user.json');
        $data = json_decode($data);
        $index = 0;
        if(!empty($data)){
            foreach($data as $row){
                ?>
                <tr>
                    <td><?php echo $row->student_name; ?></td>
                    <td><?php echo $row->registration; ?></td>
                    <td><?php echo $row->grade; ?></td>
                    <td><?php echo $row->classroom; ?></td>
                    <td><a href="update.php?edit_id=<?php echo $index; ?>">Edit</a>&nbsp; &nbsp;<a href="delete.php?delete_id=<?php echo $index; ?>">Delete</a> </td>
                </tr>
                <?php
                $index++;
            }
        }
        ?>

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>