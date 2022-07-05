<?php

$con = mysqli_connect('localhost','root','','demo');
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $ids = $_SESSION['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    //
    $qry = mysqli_query($con,"UPDATE Consultants SET address='".$address."',phone='".$phone."',password='".$password."' WHERE id='".$id."'");
    if ($qry)
    {
        echo "<script>alert('Updated')</script>";
        header("Location: http://127.0.0.1/demo/consultants/profile.php");

    }
    else{
        echo $con->error;
    }
}