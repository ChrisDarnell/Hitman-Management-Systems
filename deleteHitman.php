<?php



include 'conn.php';
if(isset($_GET['id'])){
 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "delete from assassin where id=$id";
    $con->query($sql);
    header('location:hitmanRegistration.php');
}
