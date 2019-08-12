<?php


if(isset( $_POST['email']) && isset($_POST['pwd'])){
$email = $_POST['email'];
$pwd = $_POST['pwd'];
include 'conn.php';

if(isset($_POST['adminBtn'])){
$sql = "select * from admin where email='$email' and password='$pwd'";
}else if(isset($_POST['clientBtn'])){
$sql = "select * from clients where email='$email' and password='$pwd'";
}else if(isset($_POST['hitmanBtn'])){
$sql = "select * from assassin where email='$email' and password='$pwd'";
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
         header('location:clientDashboard.php');
    }else if(isset($_POST['hitmanBtn'])){
            $row = $result->fetch_assoc();
             $_SESSION['hitmanId']= $row['id'];
             header('location:hitman.php');
    }

}else{
    //invalid user
    die('Invalid credentials');


}
}
