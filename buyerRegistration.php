<html>
    <head>
        <title>Buyer Management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: linear-gradient(to right, #3E5151 , #DECBA4);">
        <?php
        include 'anav.php';
        include 'conn.php';

        if(isset($_POST['submit'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $pass= $_POST['pass'];
            $phone= $_POST['phone'];
            $owned=$_POST['owned'];

            $qry="insert into owner(name,email,password,phone,owned) value('$name','$email','$pass','$phone','$owned');";
            $run= mysqli_query($con,$qry);
            if($run==TRUE){
                echo 'Record Inserted';
            }
        }
        ?>

        <div style="width: 400px;margin-left: 35%;margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px">
            <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Owner Registration</div>
            <legend></legend>
            <form class="form-horizontal" action="oregistration.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>

            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input style="width: 150%" name="name" placeholder=" Name" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  name="email" style="width: 150%" placeholder="you@example.org" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  name="pass" style="width: 150%" placeholder=" Password" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="mobile" style="width: 150%" placeholder=" +91<10 digit>" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <select class="form-control" style="display:inline; width: 150%;" name="building" id="building" >
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
            </div>
  </div></div>

            <div class="form-group">
  <div class="col-md-8 inputGroupContainer">

            <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-equalizer"></i></span>
     <select id="jbInfo" name="jbInfo" class="form-control selectpicker" style="display:inline; width: 150%;" >
      <option value=" " >Select Target First</option>

    </select>
            </div>
  </div></div>
            <button style="margin-left: 60%; margin-top: 20px" type='submit' class="btn btn-warning" name="submit" value="submit">Register</button>
               </form>


        <script>
//      let planrates = new Map();
          $("#targetInfo").change(function(){
                    console.log("Target changed");
                    var bid=$("#targetInfo").val();
                      console.log("bid:"+bid);
            $.get("restful/getJobs.php?bid="+bid, function(data, status){

                $('#jbInfo').html(data);
                console.log("success");
            });
         });
         </script>
    </body>
