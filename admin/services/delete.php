<?php
$con = mysqli_connect('localhost','root','','demo');
if (isset($_POST['delete']))
{
    $id = $_POST['id'];
    $qry = mysqli_query($con,"DELETE FROM services where id ='".$id."'");
    if ($qry)
    {
        echo "<script>alert('Success')</script>";
        header('Location: http://127.0.0.1/demo/services.php');
    }
    else{
        echo $con->error;
    }
}