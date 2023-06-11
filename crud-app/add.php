<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Add Student Page</title>
</head>
<body>
<?php
if(isset($_POST['btnadd'])){
    $data = file_get_contents('user.json');
    $data = json_decode($data, true);
    $add_arr = array(
        'student_name' => $_POST['txtName'],
        'registration' => $_POST['txtReg'],
        'grade' => $_POST['txtGrade'],
        'classroom' => $_POST['txtClass'],
    );
    $data[] = $add_arr;

    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('user.json', $data);

    header('location: index.php');
}
?>
<div class="container text-light text-justify">
    <form method="post" name="frmAdd">
        <table class="table table-dark table-bordered align-middle">
            <tr>
                <td colspan="2" align="center">Add Record</td>
            </tr>

            <tr>
                <td>Student Name</td>
                <td><input type="text" name="txtName"> </td>
            </tr>
            <tr>
                <td>Registration Number</td>
                <td><input type="text" name="txtReg"> </td>
            </tr>
            <tr>
                <td>Grade</td>
                <td><input type="number" name="txtGrade" min="0" max="10"> </td>
            </tr>
            <tr>
                <td>Classroom</td>
                <td><input type="text" name="txtClass"> </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Add" name="btnadd"> </td>
            </tr>
        </table>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>