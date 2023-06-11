<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Update Student Page</title>
</head>
<body>
<?php
$edit_id = $_GET['edit_id'];
//get json data
$data = file_get_contents('user.json');
$data_array = json_decode($data, true);
$row = $data_array[$edit_id];

if(isset($_POST['btnUpdate']))
{

    $update_arr = array(
        'id' => $_POST['id'],
        'student_name' => $_POST['txtName'],
        'registration' => $_POST['txtReg'],
        'grade' => $_POST['txtGrade'],
        'classroom' => $_POST['txtClass'],
    );

    $data_array[$edit_id] = $update_arr;

    $data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('user.json', $data);

    header('location: index.php');
}
?>

<div class="container text-light text-justify">
    <form method="post" name="frmUpdate">
        <table class="table table-dark table-bordered align-middle">
            <tr>
                <td colspan="2" align="center">Update Record</td>
            </tr>

            <tr>
                <td>Student Name</td>
                <td><input type="text" name="txtName" value="<?php echo $row['student_name'];?>"> </td>
            </tr>
            <tr>
                <td>Registration Number</td>
                <td><input type="text" name="txtReg" value="<?php echo $row['registration'];?>"> </td>
            </tr>
            <tr>
                <td>Grade</td>
                <td><input type="number" name="txtGrade" min="0" max="10" value="<?php echo $row['grade'];?>"> </td>
            </tr>
            <tr>
                <td>Classroom</td>
                <td><input type="text" name="txtClass" value="<?php echo $row['classroom'];?>"> </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Update" name="btnUpdate"> </td>
            </tr>
        </table>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>