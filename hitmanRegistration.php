<html>
    <head>
        <title>Hitman Registration</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('img/gunman.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">
        <?php
        include 'adminNav.php';
        include 'conn.php';


// Add new...

        if(isset($_POST['submit'])){
            $truename= $_POST['truename'];
            $codename= $_POST['codename'];
            $email= $_POST['email'];
            $pass= $_POST['pass'];
            $phone= $_POST['phone'];
            $location= $_POST['location'];
            $retainer= $_POST['retainer'];


            $qry="insert into assassin(truename, codename, email, password, phone, location, retainer) values ('$truename', '$codename', '$email','$pass','$phone', '$location', '$retainer');";
            $run= mysqli_query($con,$qry);
            if($run==TRUE){
                echo 'Record Inserted';
            }
        }
        ?>

        <div style="width: 400px;margin-left: 35%;margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px">
            <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Add Hitman</div>
            <legend></legend>
            <form class="form-horizontal" action="hitmanRegistration.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>

            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input style="width: 150%" name="truename" placeholder="True Name" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
<div class="form-group">
<div class="col-md-8 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input style="width: 150%" name="codename" placeholder="Code Name" required="" class="form-control"  type="text" value="" >
</div>
</div>
</div>
            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  name="email" style="width: 150%" placeholder="Email" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  type="password" name="pass" style="width: 150%" placeholder="Set Password" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="phone" style="width: 150%" placeholder="Phone" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
<div class="form-group">
<div class="col-md-8 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
<input  name="location" style="width: 150%" placeholder="Location" required="" class="form-control"  type="text" value="" >
</div>
</div>
</div>
<div class="form-group">
<div class="col-md-8 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input  name="retainer" style="width: 150%" placeholder="Base Retainer" required="" class="form-control"  type="number" value="" >
</div>

            <button style="margin-left: 40%; margin-top: 20px" type='submit' class="btn btn-warning" name="submit" value="submit">Register</button>
               </form>
               </div></div></div></div>

               <table class="table table-hover table-condensed" style="margin-top: 5%">
                   <thead style="background: #660066;color:white">
                   <th>ID</th>
                     <th>True Name</th>
                     <th>Code Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Location</th>
                     <th>Retainer</th>
                    <th>Update</th>
                       <th>Delete</th>
                   </thead>
                   <tbody>
                       <?php
                       $sql = "select * from assassin;";
                       $result=mysqli_query($con,$sql);
                       if($result){
                           while($row = $result->fetch_assoc()){


                       ?>
                       <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['truename'];?></td>
                           <td><?php echo $row['codename'];?></td>
                           <td><?php echo $row['email']; ?></td>
                           <td><?php echo $row['phone'];?></td>
                           <td><?php echo $row['location'];?></td>
                           <td><?php echo $row['retainer'];?></td>
                           <td><a href="assassins.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                           <td><a href="deleteHitman.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                       </tr>
                       <?php
                       }
                       }
                       ?>
                   </tbody>
               </table>
                       </div>



<!-- Restful Call  -->
                       <!-- <script>
      $("#assassin").change(function(){
                console.log("Added Hitman");
                var id=$("#assassin").val();
                  console.log("id:"+id);
        $.get("restful/getContracts.php?id="+bd, function(data, status){

            $('#aprt').html(data);
            console.log("success");
        });
     });
     </script> -->



    </body>
