<?php
$con = mysqli_connect('localhost','root','','demo');
if (isset($_POST['edit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];


    //"update new_record set trn_date='".$trn_date."',
    //name='".$name."', age='".$age."',
    //submittedby='".$submittedby."' where id='".$id."'";

    $qry = mysqli_query($con,"UPDATE clients SET fullname='".$name."',email='".$email."',phone='".$phone."',gender='".$gender."' WHERE id='".$id."'");
    if ($qry)
    {
        echo "<script>alert('Successfully Updated Client')</script>";
        header("Location: http://127.0.0.1/demo/consultants/clients.php");
    }
    else{
        echo $con->error;
    }
}
?>