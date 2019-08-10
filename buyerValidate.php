<?php


session_start();
if(!isset($_SESSION['buyerId'])){

    header('location:buyerLogin.php');
    die();
}
$buyerId= $_SESSION['buyerId'];
