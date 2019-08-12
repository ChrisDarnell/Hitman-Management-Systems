<?php



session_start();
if(!isset($_SESSION['hitmanId'])){
    header('location:hitmanLogin.php');
    die();
}
$hitmanId=$_SESSION['hitmanId'];
