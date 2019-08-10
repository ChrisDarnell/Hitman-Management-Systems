<?php



session_start();
if(!isset($_SESSION['tid'])){
    header('location:hitmanLogin.php');
    die();
}
$tid=$_SESSION['tid'];
