<?php

if(isset( $_POST['email']) && isset($_POST['pwd'])){
$email = $_POST['email'];
$pwd = $_POST['pwd'];
include 'conn.php';

if(isset($_POST['adminBtn'])){
$sql = "select * from admin where email='$email' and password='$pwd'";
}else if(isset($_POST['buyerBtn'])){
$sql = "select * from buyerInfo where email='$email' and password='$pwd'";
}else if(isset($_POST['hitmanBtn'])){
$sql = "select * from hitmanInfo where email='$email' and password='$pwd'";
}

$result = $con->query($sql);
if($result->num_rows>0){


  // If user is valid...


    session_start();
    if(isset($_POST['adminBtn'])){
    $_SESSION['adminLogin']=true;
    header('location:targetInfo.php');
}else if(isset($_POST['buyerBtn'])){
        $row = $result->fetch_assoc();
         $_SESSION['oid']= $row['id'];
         header('location:buyerDashboard.php');
    }else if(isset($_POST['hitmanBtn'])){
            $row = $result->fetch_assoc();
             $_SESSION['tid']= $row['id'];
             header('location:hitmanInfo.php');
    }

}else{


    // User is invalid

    die('Invalid credentials');


}
}
