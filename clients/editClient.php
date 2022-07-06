<?php
    $con = mysqli_connect('localhost','root','','demo');
    if (isset($_POST['update']))
    {
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        //write your query
        $qry = mysqli_query($con,"UPDATE clients SET phone='".$phone."',password='".$password."' WHERE id='".$id."'");
        if ($qry){
            echo  "<script>alert('Updated Successfully')</script>";
            header('Location: http://127.0.0.1/demo/clients/profile.php');
        }
        else{
            echo $con->error;
        }
    }
