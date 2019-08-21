<?php
include 'hitmanValidate.php';
include 'hitmanNav.php';
include 'conn.php';
?>

<html lang="en" >

<head>
        <title>Hitman Dashboard</title>
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
    <body style="background-image: url('img/john.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">
          <div class='row' style="padding: 50px">
            <div  class="col-md-7 box" style="background-color:#adadad; margin-left:1%; ">
                <h1>Welcome to your Dashboard, Killer<h1>
                  <h3> Your Information</h3>


                  <div class="col-md-20">

                  <table class="table table-hover table-condensed" style="margin-top: 5%">
                      <thead style="background: #660066;color:white">
                      <th>ID</th>
                       <th>True Name</th>
                        <th>Code Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Retainer</th>
                      </thead>
                      <tbody>
                          <?php
                          include 'conn.php';
                          if(isset($_GET['update'])){
                           $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
                           $sql = "select * from assassin";
                           $result= mysqli_query($con, $sql);
                         }

                          if($result){
                              while($row = $result->fetch_assoc()){


                          ?>
                          <tr>
                              <td><?php echo $row['id'];?></td>
                              <td><?php echo $row['truename'];?></td>
                              <td><?php echo $row['codename'];?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['location']; ?></td>
                              <td><?php echo $row['retainer']; ?></td>
                            </tr>
                          <?php
                          }
                        }
                          ?>
                      </tbody>
                  </table>
               </div>
             </body>
         </html>
