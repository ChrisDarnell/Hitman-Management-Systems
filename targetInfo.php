<?php
include 'adminValidate.php';
include 'conn.php';



$id = $name= $add= $dev = "";
if(isset($_GET['update'])){
 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "select * from targetInfo where id=$id;";
                $result=mysqli_query($con,$sql);
                if($result){
                    if($row = $result->fetch_assoc()){
                        $id= $row['id'];
                         $name= $row['Name'];
                          $add= $row['Location'];
                           $dev= $row['Danger'];
                    }
                    }

}

// New Target record


if(isset($_POST['submit'])){

    // $name=$_POST['bname'];
    $address=$_POST['name'];
    $address=$_POST['address'];
    $danger=$_POST['danger'];

    if(isset($_POST['id']) && $_POST['id']){
        $id= $_POST['id'];
        $qry = "update targetInfo set Name='$name',Location='$location',Danger='$danger' where id=$id";

     }else{

        $qry="insert into targetInfo(Name,Location,Danger) values('$name','$address','$danger')";
     }
//     echo $qry;
    $run=mysqli_query($con,$qry);
    if($run==true){
        if(isset($_POST['id'])){
        echo 'record Updated';
        $id = $name= $add= $dev = "";
        }else{
             echo 'record inserted';
        }
    }
    else{
        echo 'error executing query';
    }
}



?>
<html>
    <head>
        <title>Target Management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    </head>
    <body style="background-image:url('img/hitman.jpg') ; background-size: cover; background-repeat: no-repeat;">
        <?php
        include 'anav.php';
        ?>

        <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px">
        <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Create New Building</div>
        <form class="form-horizontal" action="targetInfo.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div class="form-group" style="margin-top: 5px">
    <label class="control-label col-sm-2" for="targetInfo">Target:</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="targetName" placeholder="Enter Target Name" value="<?php echo $name;?>"/><br>
    </div>
            </div>

            <div class="form-group" style="margin-top: 1px">
    <label class="control-label col-sm-2" for="targetInfo">Location:</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="location" placeholder="Enter Target's Location" value="<?php echo $add;?>"/><br>
    </div>
            </div>

            <div class="form-group" style="margin-top: 1px">
    <label class="control-label col-sm-2" for="targetInfo">Danger Level:</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="danger" placeholder="Danger" value="<?php echo $dev;?>"/><br>
    </div>
            </div>
            <button class="btn btn-warning" type="submit" name="submit" value="add">Add Target</button>
        </form>
        </div>
        </div>
            <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed table-responsive" style="margin-top: 5%">
            <thead style="background: #660066;color:white">
            <th>ID</th>
             <th>Name</th>
              <th>Location</th>
               <th>Danger</th>
               <th>Update</th>
               <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from targetInfo;";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){


                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Location'];?></td>
                    <td><?php echo $row['Danger'];?></td>
                    <td><a href="targetInfo.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deleteTarget.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php
                }
                }
                ?>
            </tbody>
        </table>
                    </div>
                </div>
        </div>
    </body>
</html>
