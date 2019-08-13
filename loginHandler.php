<?php


if(isset( $_POST['email']) && isset($_POST['pwd'])){
$email = $_POST['email'];
$password = $_POST['pwd'];
include 'conn.php';

if(isset($_POST['adminBtn'])){
$sql = "select * from admin where email='$email' and password='$password'";
}else if(isset($_POST['clientBtn'])){
$sql = "select * from clients where email='$email' and password='$password'";
}else if(isset($_POST['hitmanBtn'])){
$sql = "select * from assassin where email='$email' and password='$password'";
}

$result = $con->query($sql);
if($result->num_rows>0){


  // User is valid
    session_start();
    if(isset($_POST['adminBtn'])){
    $_SESSION['adminLogin']=true;
    header('location:clients.php');
    }else if(isset($_POST['clientBtn'])){
        $row = $result->fetch_assoc();
         $_SESSION['assasId']= $row['id'];
         header('location:hitman.php');
    }else if(isset($_POST['hitmanBtn'])){
            $row = $result->fetch_assoc();
             $_SESSION['id']= $row['id'];
             header('location:hitman.php');
    }

}else{
    //Invalid user
    die('Invalid credentials');


}
}
