<?php
include 'clientValidate.php';
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
    filter: alpha(opacity=50);
}
  </style>
</head>
    <body>
        <?php
        include 'clientNav.php';
        include 'conn.php';

        if(isset($_POST['submit'])){
            $number= $_POST['number'];
            $value= $_POST['value'];
            $description= $_POST['description'];

            $qry="insert into contracts(number,value,description) value('$number','$value','$description','$phone','$contracts);";
            $run= mysqli_query($con,$qry);
            if($run==TRUE){
                echo 'Record Inserted';
            }

        }
        ?>
        <div  style=" background-image: url('img/sniper.jpg');background-size: cover;background-repeat: no-repeat;width: 100%; height:100%;box-shadow: 0px 0px 5px #660066;padding:20px">
            <div>
                <form class="form-horizontal" action="hitmanRegistration.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <legend>
                Contract Registration
            </legend>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
  <input style="width: 110%;height: 40px" name="value" placeholder="Contract Value" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
  <input  name="number" style="width: 110%;height: 40px" placeholder="Assign Contract Number" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input  name="description" style="width: 110%;height: 40px" placeholder="Contract Description" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>




<!-- Select contracts to come


            <select class="form-control" style="display:inline; margin-left: 140px; width: 20%;" name="contracts" id="contracts">
                 <option>Select contracts</option>
                    <?php
                                include 'conn.php';
                                $qry="select * from contracts";
                                if ($result = $con->query($qry)) {

    /* fetch object array */

    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id' ]; ?>"><?php echo $row['Name of Target']; ?>
                        </option>
               <?php
    }
    }
    ?> </select>

           <select class="form-control" style="display:inline; width: 20%;" name="contracts" id="htMn">
                 <option>Select contracts first</option>


             </select> -->


            <button style="margin-left: 20%; margin-top: 20px" type='submit' class="btn btn-warning" name="submit" value="submit">Register</button>
            </form>
            </div>
        </div>

         <script>
//      let planrates = new Map();
          $("#contracts").change(function(){
                    console.log("Reached contracts change");
                    var contractValue=$("#contracts").val();
                      console.log("contractValue:"+contractValue);
            $.get("restful/gethitman.php?contractValue="+contractValue, function(data, status){

                $('#htMn').html(data);
                console.log("success");
            });
         });
         </script>

    </body>
