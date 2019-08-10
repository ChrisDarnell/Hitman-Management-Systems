<?php


session_start();
if(!isset($_SESSION['adminlogin'])){
    header('location:index.php');
    die();
}
