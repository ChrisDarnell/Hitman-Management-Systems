<?php

session_start();
if(!isset($_SESSION['adminLogin'])){
    header('location:index.php');
    die();
}
