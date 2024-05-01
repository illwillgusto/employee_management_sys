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
          <a href="#login"><span class="glyphicon glyphicon-log-in" ></span>LOGIN</a></li>
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

    </div>
  </div>


  </div>
</div>

</body>
</html>
