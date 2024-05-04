<?php
session_start();
include ('pdo-connection.php');
include ('database-config.php');


$dbuser = $database_user;
$dbpass = $database_pass;
$dbname = $database_name;

$dbcon = $connection_object->connection('localhost', $dbname, $dbuser, $dbpass);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management Dashboard</title>

  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <!-- Bootstrap compiled JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/8716b95af6.js" crossorigin="anonymous"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<!-- Navbar start -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">EMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#brand">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li data-toggle="modal" data-target="#myModal">
          <a href="#login"><span class="fas fa-lock"></span>LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content -->

  <div class="modal-content">
    <div class="modal-header">
      <!-- button allows the user a way to dismiss the modal dialog and return to the main content -->
      <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
      <h4><span class="fas fa-lock">LOG IN</span></h4>
    </div>
    <div class="modal-body">
      <form role="form" action="" method="post">
        <div class="form-group">
          <label for="username"><span class="fas fa-user"></span> UserName </label>
          <input type="text" name="loginEmail" class="form-control" id="username" placeholder="Enter Email">
        </div>
        <div class="form-group">
          <label for="password"><span class="fas fa-key    "></span> Password </label>
          <input type="password" name="loginPassword" class="form-control" id="pwd" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-block">LOG IN
          <span class="fas fa-check"></span>
        </button>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
        <span class="fas fa-window-close"></span>Cancel
      </button>
      <p>Need<a href="#">Help?</a></p>
    </div>
  </div>
  </div>
</div>

<!-- PHP Code -->

<?php

// check if the 'login' button has been pressed on the form submission, it will retrieve the user's email and password
if (isset($_POST['login'])) {
  $loginmail= $_POST['loginEmail'];
  $loginpass= md5($_POST['loginPassword']);

// query used ti verify if there exists a user record that matches both email and the hashed password
  $sql = " SELECT * FROM login_info WHERE Email='$loginmail' AND Password= '$loginpass' ";
  $data = $dbcon->query($sql);
  $row = $data->fetch(PDO::FETCH_ASSOC);

}
?>
</body>
</html>
