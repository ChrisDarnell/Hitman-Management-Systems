<?php


include 'hitmanValidate.php';
include 'hitmanNav.php';
?>

<html lang="en" >

<head>
        <title>Hitman Home </title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type='text/css' href="css/util.css">
  <link type='text/css' href="css/main.css">

  <style>
.box {
  transition: box-shadow .3s;

  margin: 50px;
  border-radius:10px;
  border: 1px solid #ccc;
 background-image: linear-gradient(to right, #3E5151 , #DECBA4);
  float: left;
   box-shadow: 0px 0px 5px #000
}
.box:hover {
  box-shadow: 0px 0px 10px #fff;

}
div.a {
    font-size: 18px;
}

    </style>

</head>
    <body style="background-image: url('img/hitman.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">
          <div class='row' style="padding: 50px">

            <div  class="col-md-7 box" style="background-color:#adadad; margin-left:1%; ">
        <?php
        include 'conn.php';

        $sql = "select *,(select name from buyerInfo where owned=t.jobInfo)as owner,(select jobNumber from jobInfo where id=t.apartment)as apartment from tenant t where id=$tid";
                $run= mysqli_query($con, $sql);{

                while ($row = $run->fetch_assoc()) {


      ?>

                <h1 style="color: #fff;background: #033;padding: 20px;border-radius: 20px">My Details</h1><br><br>

                <div class="row" style="color:white">
                    <div class="a col-md-4" style="padding: 20px">
                   <?php      echo 'Code Name:'.$row['codename'];
                 ?>
               </div>
               <div class="a col-md-4" style="padding: 20px">
              <?php      echo 'True Name:'.$row['truename'];
            ?>
                </div>
                    <div class="a col-md-4" style="padding: 20px">
                   <?php      echo 'Email:'.$row['email'];
                 ?>
               </div>
                    <div class="a col-md-4" style="padding: 20px">
                   <?php      echo 'Phone:'.$row['phone'];
                 ?>
               </div>
                    <div class="a col-md-4" style="padding: 20px">
                   <?php      echo 'Location:'.$row['location'];
                 ?>
               </div>
                    <div class="a col-md-4" style="padding: 20px">
                   <?php      echo 'Apartment Number:'.$row['apartment'];
                 ?>
               </div>

                    <div class="a col-md-4" style="padding: 20px">
                   <?php      echo 'Retainer:'.$row['retainer'];
                 ?>
               </div>
                    <form action="payment.php" method="POST">
                      <div class="a" style="padding: 40px; margin: 40px">
                          <input type="hidden" name="tid" value="<?php echo  $tid;?>" />
                          <button style="margin:30px" class="btn btn-success pull-right " type="submit">Pay Killer</button>
               </div>
                    </form>
           </div>
        <?php
                }}
        ?>
                     </div>
               <div  class="col-sm-3 box" style="background-color:#adadad; margin-left:10px;">
                   <legend><b>Payment History</b></legend>
                   <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
       <?php
         include 'conn.php';
         $sql = "select * from transaction where tid=$tid";
         if ($result = $con->query($sql)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {

        ?>
            <tr>

                <td><?php echo $row['id']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['amount']?></td>
                </tr>
            <?php


    }

    /* free results */


    $result->close();
}



         ?>

        </tbody>
                   </table>
                </div>

 </div>
