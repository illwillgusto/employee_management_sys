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

  $user_Mail = $row['Email'];
  $user_Pass = $row['Password'];
  $user_Role = $row['Role'];
  $e_id = $row['Employee_id'];

  if($user_Mail !="" && $user_Pass !="") {
    $_SESSION['login'] = "TRUE";
    $_SESSION['user'] = $user_Mail;
    $_SESSION['e_id'] = $e_id;
    $_SESSION['user_Role'] = $user_Role;

    if ($user_Role == "Admin") {
      echo("<script>location.href='admin.php'</script>");
    } else {
      echo("<script>location.href='employee.php'</script>");
    }
  } else {
    $error = "Wrong Username or Password";
    echo "<script>alert(\"$error\")</script>";
    echo ("<script>location.href='home.php'</script>");
  }
}
?>

<!-- Navbar Close -->
<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide="0" class="active"></li>
  <li data-target="#myCarousel" data-slide="1"></li>
  <li data-target="#myCarousel" data-slide="2"></li>
</ol>

<!-- Wrapper Slides -->
<div class="carousel-inner" role="listbox">
  <div class="item-active">
    <img class="imgL" src="" alt="Image">
    <div class="carousel-caption car">
      <h3 style="color:#b29600">We are Specialized In Chicago</h3>
      <button type="submit" class="button"><span>Know More</span></button>
    </div>
  </div>

  <div class="item">
    <img class="imgL" src="" alt="Image">
    <div class="carousel-caption car black carL">
      <h3 style="color:#b29600">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</h3>
    </div>
  </div>

  <div class="item">
    <img class="imgL" src="" alt="Image">
    <div class="carousel-caption car black carL">
      <div class="black">
        <h2 style="color:#b29600; font-weight:bold"> We Care About Our Employees</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      </div>
    </div>
  </div>
</div>
</div>

<!-- The About Section -->
<div id="band" class="container text-center">
  <div class="about"><h3 style="color: #b29600;"><b>THE EMS</b></h3>
    <p style="color: #b29600;">We Believe In Efficiency</p>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
  </div>
  <div class="hr">
    <hr>
  </div>
  <br>

  <div id="#" class="row humpty">
    <div class="col-sm-4">
      <p class="text-center"><strong>Bruce Wayne</strong></p>
      <a href="#demo" data-toggle="collapse">
        <img src="" alt="Random Name" class="img-circle person person1" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>Vice President</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Clark Kent</strong></p>
      <a href="#demo2" data-toggle="collapse">
        <img src="" alt="Random Name" class="img-circle person person1" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>CEO</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Wonder Woman</strong></p>
      <a href="#demo3" data-toggle="collapse">
        <img src="" alt="Random Name" class="img-circle person person1" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>CTO</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Bruce Banner</strong></p>
      <a href="#demo4" data-toggle="collapse">
        <img src="" alt="Random Name" class="img-circle person person1" width="255" height="255">
      </a>
      <div id="demo4" class="collapse">
        <p>President</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Tony Stark</strong></p>
      <a href="#demo5" data-toggle="collapse">
        <img src="" alt="Random Name" class="img-circle person person1" width="255" height="255">
      </a>
      <div id="demo5" class="collapse">
        <p>Operations Manager</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Professor X</strong></p>
      <a href="#demo6" data-toggle="collapse">
        <img src="" alt="Random Name" class="img-circle person person1" width="255" height="255">
      </a>
      <div id="demo6" class="collapse">
        <p>Founder</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
  </div>
</div>


</body>
</html>
