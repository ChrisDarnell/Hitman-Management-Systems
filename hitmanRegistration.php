<?php
include 'buyerValidate.php';
?>
<html>
    <head>
        <title>Hitman Management System by Chris Darnell</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
      #img {
    opacity: 0.5;
    filter: alpha(opacity=50); /* For IE8 and earlier */
}
  </style>
</head>
    <body>
        <?php
        include 'buyerNav.php';
        include 'conn.php';

        if(isset($_POST['submit'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $pass= $_POST['pass'];
            $mobile= $_POST['phone'];
            $building=$_POST['location'];
            $apartment=$_POST['apartment'];
            $rent=$_POST['rent'];

            $qry="insert intp hitmanInfo(name,email,password,phone,location,jobNumber,retainer,date,oid) value('$name','$email','$pass','$mobile','$building','$apartment','$rent',CURDATE(),'$oid');";
            $run= mysqli_query($con,$qry);
            if($run==TRUE){
                echo 'Record Inserted';
            }

        }
        ?>
        <div  style=" background-image: url('img/hitman.jpg');background-size: cover;background-repeat: no-repeat;width: 95%; height:80% ;margin-left: 2%;margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px">
            <div>
                <form class="form-horizontal" action="hitmanRegistration.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <legend>
                Hitman Registration
            </legend>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input style="width: 110%;height: 40px" name="name" placeholder=" Name" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  name="email" style="width: 110%;height: 40px" placeholder="you@example.org" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  name="pass" style="width: 110%;height: 40px" placeholder=" Password" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="mobile" style="width: 110%;height: 40px" placeholder=" +91<10 digit>" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>



            <select class="form-control" style="display:inline; margin-left: 140px; width: 20%;" name="targetInfo" id="targetInfo">
                 <option>Select Target</option>
                    <?php
                                include 'conn.php';
                                $qry="select * from targetInfo";
                                if ($result = $con->query($qry)) {

    /* fetch object array */

    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id' ]; ?>"><?php echo $row['Name']; ?>
                        </option>
               <?php
    }
    }
    ?> </select>

           <select class="form-control" style="display:inline; width: 20%;" name="jobInfo" id="jbInfo">
                 <option>Select Target first</option>


             </select>

            <div class="form-group" style="margin-left: 10%;margin-top: 20px">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
  <input  name="rent" style="width: 110%;height: 40px" placeholder=" Rent Amount" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <button style="margin-left: 80%; margin-top: 20px" type='submit' class="btn btn-warning" name="submit" value="submit">Register</button>
            </form>
            </div>
        </div>

         <script>

          $("#targetInfo").change(function(){
                    console.log("Job changed");
                    var bid=$("#targetInfo").val();
                      console.log("bid:"+bid);
            $.get("restful/getHitmen.php?bid="+bid, function(data, status){

                $('#jbInfo').html(data);
                console.log("success");
            });
         });
         </script>

    </body>
