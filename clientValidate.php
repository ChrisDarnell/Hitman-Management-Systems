<?php


session_start();
if(!isset($_SESSION['clientId'])){

    header('location:clientLogin.php');
    die();
}
$clientId= $_SESSION['clientId'];
