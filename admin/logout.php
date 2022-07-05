<?php
if (isset($_POST['logout'])){
    session_start();
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['user']);
    header('Location: login.php');
}
?>

