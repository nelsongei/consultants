<?php
$con = mysqli_connect('localhost','root','','demo');
$message = '';
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    //Update Query
    $qry = mysqli_query($con,"UPDATE services SET name='".$name."',price='".$price."' WHERE id = '".$id."'");
    if ($qry)
    {
        echo "<script>alert('Updated Successfully')</script>";
        header('Location: http://127.0.0.1/demo/admin/services.php');
    }
    else{
        echo  $con->error;
    }
}