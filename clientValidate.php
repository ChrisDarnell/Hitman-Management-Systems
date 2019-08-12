<?php


session_start();
if(!isset($_SESSION['assasId'])){

    header('location:clientLogin.php');
    die();
}
$assasId= $_SESSION['assasId'];
