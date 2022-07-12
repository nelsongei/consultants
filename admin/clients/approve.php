<?php
$con = mysqli_connect('localhost', 'root', '', 'demo');
if (isset($_POST['approve']))
{
    $id = $_POST['id'];
    $status = true;
    //query
    $qry = mysqli_query($con,"UPDATE client_requests SET STATUS = '".$status."' WHERE id = '".$id."'");
    if ($qry )
    {
        echo "<script>alert('Success')</script>";
        header("Location: http://127.0.0.1/demo/admin/reports.php");
    }
    else{
        echo $con->error;
    }
}
?>