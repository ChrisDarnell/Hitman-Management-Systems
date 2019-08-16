<?php


include 'clientValidate.php';
include 'conn.php';

if(isset($_POST['id'])){
    $sql="select id from clients where id=$id";
    if($result= mysqli_query($con, $sql)){
        $row =$result->fetch_assoc();
        $date=$row['date'];
        $retainer=$row['retainer'];
    }

    $qry="insert into transaction (id,date,amount) values('$id',CURDATE(),'$retainer')";
    $run=mysqli_query($con,$qry);
    if($run=TRUE){
        ?>
<script>
        alert('Payment Successful!!');
        window.open('clientDashboard.php','_self');

        </script>
        <?php
}
}
?>
