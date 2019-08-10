<?php



include 'conn.php';
if(isset($_GET['id'])){
 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "delete from jobInfo where id=$id";
    $con->query($sql);
    header('location:jobInfo.php');
}
