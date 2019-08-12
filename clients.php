<?php
include 'adminValidate.php';
include 'conn.php';

//For update
$id = $name= $add= $dev = "";
if(isset($_GET['update'])){
 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "select * from clients where id=$id;";
                $result=mysqli_query($con,$sql);
                if($result){
                    if($row = $result->fetch_assoc()){
                        $id= $row['id'];
                         $name= $row['name'];
                          $email= $row['email'];
                            $phone= $row['phone'];
                            $password= $row['password'];
                    }
                    }

}

// for new record


if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];

    if(isset($_POST['id']) && $_POST['id']){
        $id= $_POST['id'];
        $qry = "update clients set name='$name',email='$email',password='$password',phone='$phone' where id=$id";

     }else{

        $qry="insert into clients(name,email,password, phone) values('$name','$email','$password','$phone')";
     }

    $run=mysqli_query($con,$qry);
    if($run==true){
        if(isset($_POST['id'])){
        echo 'Record Updated';
        $id = $name= $add= $dev = "";
        }else{
             echo 'Record inserted';
        }
    }
    else{
        echo 'Error - try again';
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
    <body style="background-image:url('img/hitman.jpg') ; background-size: cover; background-repeat: no-repeat;">
        <?php
        include 'adminNav.php';
        ?>

        <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;box-shadow: 0px 0px 5px #660066;padding:20px">
        <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Create New Client</div>
        <form class="form-horizontal" action="clients.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div class="form-group" style="margin-top: 5px">
    <label class="control-label col-sm-2" style="color:green" for="name">Name</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="name" placeholder="Client Name" value="<?php echo $name;?>"/><br>
    </div>
            </div>
            <div class="form-group" style="margin-top: 1px">
    <label class="control-label col-sm-2" style="color:green" for="email">Client Email</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="email" placeholder="Client Email" value="<?php echo $name;?>"/><br>
    </div>
            </div>

            <div class="form-group" style="margin-top: 1px">
    <label class="control-label col-sm-2" style="color:green" for="password">Set Password</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="password" placeholder="Set Password" value="<?php echo $name;?>"/><br>
    </div>
  </div>
    <div class="form-group" style="margin-top: 1px">
      <label class="control-label col-sm-2" style="color:green" for="clients">Client Phone</label>
      <div class="col-sm-10" >
        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $name;?>"/><br>
      </div>
        </div>
            <button class="btn btn-warning" type="submit" name="submit" value="add">Submit</button>
        </form>
        </div>
        </div>
            <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed table-responsive" style="margin-top: 5%">
            <thead style="background: #660066;color:white">
            <th>ID</th>
             <th>Client Name</th>
              <th>Email</th>
               <th>Phone</th>
               <th>Update</th>
               <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from clients;";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){


                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><a href="clients.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deleteclients.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
