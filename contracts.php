<?php
include 'conn.php';

$id=0;
$contractValue=$contractNumber=$desc=$clientId=$hitmanId="";
if(isset($_GET['update'])){
    $id = $_GET['id'];
     $qry="select * from contracts where id=$id";
          // "select "
  if ($result = $con->query($qry)) {


    if ($row = $result->fetch_assoc()) {
    $contractValue=$row['contractValue'];
    $contractNumber=$row['contractNumber'];
    $desc=$row['description'];
    $clientId=$row['clientId'];
    $hitmanId=$row['hitmanId'];
    }
    }
           }

// To post...

if(isset($_POST['submit'])){
    $contractValue=$_POST['contractValue'];
    $contractNumber=$_POST['$contractNumber'];
    $desc=$_POST['desc'];
    $id= $_POST['id'];
    $clientId=$row['clientId'];
    $hitmanId=$row['hitmanId'];

    if($id){
     $qry="Update contracts set contractValue='$contractValue',contractNumber='$contractNumber',description='$desc' ,clientId='$client', hitmanId=`$hitman` where id='$id'";
     $id=0;
     $contractValue=$contractNumber=$desc=$client="";
    }else{
    $qry="insert into contracts(contractValue,contractNumber,description, client, hitman) values('$contractValue','$contractNumber','$desc','$client','$hitman')";
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
    <body style="background-image: url('img/whitehitman.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">
     <?php
     include 'adminNav.php';
      ?>
     <div class="row">
      <div class="col-md-16">
     <form class="form-horizontal" action="contracts.php" method="post">
       <div style="width: 400px;margin-left:4%;margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px; text-align: left">
        <div style='text-align: left;padding:px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Enter New Contract</div>
         <label class="control-label col-sm-2" for="client">Select Client</label>
         <input type="hidden" name="id" value="<?php echo $id;?>"/>
         <div style="width: 400px;margin-left:4%;margin-top: 1.5%; text-align: left; padding-top: 10px;margin-left: 5%">
         </div>



<!-- Drop down clients -->

             <select class="form-control" style="display:inline; width: 80%;" name="client" >
                 <?php
                             include 'conn.php';
                             $qry="select * from clients";
                             if ($result = $con->query($qry)) {


 while ($row = $result->fetch_assoc()) {
                 ?>

                  <option value="<?php echo $row['name']; ?>" selected="<?php if($row['id']==$clientId){echo 'true';}else{echo 'false';}?>" ><?php echo $row['name']; ?>
                     </option>
                     <?php
 }
 }
 ?> </select>

   <div style="text-align: left; padding-top: 10px;margin-left: 5%">
   <label class="control-label col-sm-2" for="client">Select Hitman</label>
   <input type="hidden" name="id" value="<?php echo $id;?>"/>


<!-- Drop down killers -->

       <select class="form-control" style="display:inline; width: 80%;" name="assassin" >
           <?php
                       include 'conn.php';
                       $qry="select * from assassin";
                       if ($result = $con->query($qry)) {


while ($row = $result->fetch_assoc()) {
           ?>

            <option value="<?php echo $row['codename']; ?>" selected="<?php if($row['id']==$hitmanId){echo 'true';}else{echo 'false';}?>" ><?php echo $row['codename']; ?>
               </option>
               <?php
}
}
?> </select>

        <form class="form-horizontal" action="contracts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div style="text-align: left; padding-top: 10px;margin-left: 5%">
    <label class="control-label col-sm-2" for="contracts">Price:</label>
        <input type="text" class="form-control" name="contract" required="" placeholder="Contract Value" value="<?php echo $contractNumber;?>"/><br>
        <div class="form-group" style="margin-top: 3px">
         <div style="text-align: left; padding-top: 10px;margin-left: 5%">
    <label class="control-label col-sm-2" style="color:blue" for="contracts">Contract Number:</label>
        <input type="text" class="form-control" name="contractValue" required="" placeholder="Assign Contract Number" value="<?php echo $contractNumber;?>"/><br>
            <label class="control-label col-sm-2" style="color:blue" for="contracts">Contract Description:</label>
            <div class="form-group" style="margin-top: 3px">
             <div style="text-align: left; padding-top: 10px;margin-left: 5%">
        <textarea class="form-control" name="desc" required="" placeholder="Contract Description" ><?php echo $desc;?></textarea><br>
             <button class="btn btn-warning" type="submit" name="submit" value="add">Submit</button>
        </form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>





        <div class="col-md-20">

        <table class="table table-hover table-condensed" style="margin-top: 5%">
            <thead style="background: #660066;color:white">
            <th>ID</th>
             <th>Contract Value</th>
              <th>Job Number</th>
              <th>Description</th>
              <th>Client ID</th>
              <th>Hitman ID</th>
              <th>Update</th>
              <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `contracts;";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){


                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['contractValue'];?></td>
                    <td><?php echo $row['contractNumber'];?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['clientId']; ?></td>
                    <td><?php echo $row['hitmanId']; ?></td>
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
