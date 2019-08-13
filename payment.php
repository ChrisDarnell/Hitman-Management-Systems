<?php


include 'hitmanValidate.php';
include 'conn.php';

if(isset($_POST['hitmanId'])){
    $sql="select retainer from assassin where id=$hitmanId";
    if($result= mysqli_query($con, $sql)){
        $row =$result->fetch_assoc();
        $rent=$row['retainer'];
    }

    $qry="insert into transaction (hitmanId,date,amount) values('$hitmanId',CURDATE(),'$rent')";
    $run=mysqli_query($con,$qry);
    if($run=TRUE){
        ?>
<script>
        alert('Payment Successful!!');
        window.open('hitman.php','_self');

        </script>
        <?php
}
}
?>
