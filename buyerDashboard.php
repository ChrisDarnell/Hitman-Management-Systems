<?php
include 'onav.php';
?>
<html lang="en" >

<head>
        <title>Buyer Dashboard</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
.box {
  transition: box-shadow .3s;
  width: 300px;
  height: 500px;
  margin: 50px;
  border-radius:10px;
  border: 1px solid #ccc;
 background-image: linear-gradient(to right, #3E5151 , #DECBA4);
  float: left;
   box-shadow: 0px 0px 5px #003333
}
.box:hover {
  box-shadow: 0px 5px 5px #34ce57;

}
div.a {
    font-size: 100px;
}

    </style>

</head>
    <body style="background-image: url('img/hitman.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">

        <?php
        include 'conn.php';
        include 'buyerValidate.php';
        $sql = "select (select count(*) from hitmanInfo where oid=$oid)as totalHitmen,(select count(*) from buyerInfo where email=(select email from buyerInfo where id=$oid))as jobInfo";
                $run= mysqli_query($con, $sql);{

                while ($row = $run->fetch_assoc()) {
      $tenant= $row['totalHitmen'];

      $apartment=$row['jobInfo'];

      ?>
        <div class='row' style="">



            <div  class="col-sm-6 box" style="background-color:#adadad; margin-left:25%; height: 200px; width: 300px; ">
                <h1 style="color: #fff">My Hits<br></h1>
                    <div class="a" style="margin-left:90px;color: white">
                   <?php      echo $jobInfo;
                 ?>
               </div>

            </div>

            <div  class="col-sm-6 box" style="background-color:#adadad; margin-left:4%; height: 200px; width: 300px; ">
                <h1 style="color: #fff">Total Tenants<br>
                    <div class="a" style="margin-left:90px;">
                   <?php      echo $hitmanInfo;
                 ?>
               </div>
            </div>



        <?php
                }
                } ?>


</body>
</html>
