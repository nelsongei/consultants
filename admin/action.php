<?php
$con = mysqli_connect('localhost', 'root', '', 'demo');
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$insert = mysqli_query($con, "INSERT INTO users(name,email,gender)
                    VALUES ('$name','$email','$gender')");
if ($insert) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
?>