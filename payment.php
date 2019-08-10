<?php

include 'hitmanValidate.php';
include 'conn.php';

if(isset($_POST['tid'])){
    $sql="select retainer from hitmanInfo where id=$tid";
    if($result= mysqli_query($con, $sql)){
        $row =$result->fetch_assoc();
        $rent=$row['retainer'];
    }

    $qry="insert into transaction (tid,date,amount) values('$tid',CURDATE(),'$rent')";
    $run=mysqli_query($con,$qry);
    if($run=TRUE){
        ?>
<script>
        alert('Payment Success. Happy Hunting.');
        window.open('hitmanInfo.php','_self');

        </script>
        <?php
}
}
?>
