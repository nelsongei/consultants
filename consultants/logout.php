<?php


if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    unset($_SESSION['consultant']);
    unset($_SESSION['consultantName']);
    unset($_SESSION['id']);
    header('Location: login.php');
}


