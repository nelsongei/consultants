<?php


if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    unset($_SESSION['clientName']);
    unset($_SESSION['clientEmail']);
    unset($_SESSION['clientId']);
    header('Location: login.php');
}


