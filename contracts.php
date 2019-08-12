<?php
include 'conn.php';

$id=0;
$contractValue=$contractNumber=$desc="";
if(isset($_GET['update'])){
    $id = $_GET['id'];
     $qry="select * from contracts where id=$id";
  if ($result = $con->query($qry)) {


    if ($row = $result->fetch_assoc()) {
    $contractValue=$row['contractValue'];
    $contractNumber=$row['contractNumber'];
    $desc=$row['description'];
    }
    }
           }

// To post...

if(isset($_POST['submit'])){
    $contractValue=$_POST['contractValue'];
    $contractNumber=$_POST['$contractNumber'];
    $desc=$_POST['desc'];
    $id= $_POST['id'];

    if($id){
     $qry="Update contracts set contractValue='$contractValue',contractNumber='$contractNumber',description='$desc' where id='$id'";
     $id=0;
     $contractValue=$contractNumber=$desc="";
    }else{
    $qry="insert into contracts(contractValue,contractNumber,description) values('$contractValue','$contractNumber','$desc')";
    }
    $run=mysqli_query($con,$qry);
    if($run==true){
        echo'Success!';
    }
}
?>
<html>
    <head>
        <title>Contract Management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    </head>
    <body style="background-image: linear-gradient(to right, red, #DECBA4);">
     <?php
     include 'adminNav.php';
     ?>
        <div class="row">
         <div class="col-md-4">
       <div style="width: 400px;margin-left:4%;margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px">
        <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Enter New Contract</div>
        <form class="form-horizontal" action="contracts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div style="padding-top: 20px;margin-left: 25%">

  </div>
    <div class="form-group" style="margin-top: 5px">
    <label class="control-label col-sm-2" for="contracts">Price:</label>
    <div class="col-sm-10" style="margin-top:30px">
        <input type="text" class="form-control" name="contract" required="" placeholder="Contract Value" value="<?php echo $contractNumber;?>"/><br>
    </div>
  </div>
    <div class="form-group" style="margin-top: 5px">
    <label class="control-label col-sm-2" for="contracts">Contract Number:</label>
    <div class="col-sm-10" style="margin-top:30px">
        <input type="text" class="form-control" name="contractValue" required="" placeholder="Assign Contract Number" value="<?php echo $contractNumber;?>"/><br>
    </div>
    </div>
            <div style="margin-left: 30px;">
            <label class="control-label col-sm-2" for="contracts">Contract Description:</label>
            <div class="form-group" style="margin-top: 2px">
    <div class="col-sm-10" style="margin-top:0.1px">
        <textarea class="form-control" name="desc" required="" placeholder="Contract Description" ><?php echo $desc;?></textarea><br>
    </div>
            </div>
            <br>
             <button class="btn btn-warning" type="submit" name="submit" value="add">Submit</button>
        </form>
      </div>
         </div>

           </div>
        <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5%">
            <thead style="background: #660066;color:white">
            <th>ID</th>
            <!-- <th>Client</th> -->
             <th>Contract Value</th>
              <th>Job Number</th>
              <th>Description</th>
              <th>Update</th>
              <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from contracts;";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){


                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['contractValue'];?></td>
                    <td><?php echo $row['contractNumber'];?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a href="contracts.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deletecontracts.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
