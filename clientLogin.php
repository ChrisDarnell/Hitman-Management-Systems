<!DOCTYPE html>

<html>

  <head>
  <title>Hitman Management System by Chris Darnell</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background:url('img/hitman.jpg');height: 100vh">

<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Client Management</a>
    </div>
    <ul class="nav navbar-nav pull-right">

      <li><a href="index.php">Admin Login</a></li>
      <li class="active"><a href="clientLogin.php">Client Login</a></li>
      <li><a href="hitmanLogin.php">Hitman Login</a></li>
    </ul>
  </div>
</nav>


<div class="container">


    <div style="width: 400px;margin-left: 35%;margin-top: 2%;box-shadow: 0px 0px 5px #660066;padding:20px">
        <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Client Login</div>

        <form class="form-horizontal" action="loginHandler.php" method="post">
  <div class="form-group" style="margin-top: 10px">
    <label class="control-label col-sm-2" style="color:white" for="email">Email:</label>
    <div class="col-sm-10" >
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="color:white"for="pwd">Pass:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-warning" name="clientBtn" type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>
