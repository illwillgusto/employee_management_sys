<?php

session_start();
if ($_SESSION['login'] != "True") {
  $error= "Sorry You Have To Login First.";
  echo("<script>alert(\"$error\")</script>");
  echo("<script>location.href='home.php'</script>");
}

else {
  if ($_SESSION['user_Role'] != "Admin") {
    $error="Sorry You Cannot View This Page.";
    echo("<script>alert(\"$error\")</script>");
    echo("<script>location.href='home.php'</script>");
  }
  else {
    $e_id = $_SESSION['e_id'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminEX</title>
  <link rel="stylesheet" type="text/css" href="myProfile.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/8716b95af6.js" crossorigin="anonymous"></script>

  <!-- JQuery Library -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>

<!-- Navbar -->
<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="home.php">EMS</a>
      <button type="button"></button>
    </div>
    <div class="collapse navbar-collapse navbar-menubuilder">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="checkIN.php">CheckIN</a></li>
        <li><a href="attendance.php">Attendance</a></li>
        <li><a href="myProfile.php">MyProfile</a></li>
        <li><a href="addEmployee.php">AddEmployee</a></li>
        <li><a href="employeeStatus.php">EmployeeStatus</a></li>
        <li><a href="leaveManagement.php">Leave Management</a></li>
        <li><a href="workingHR.php">Working HR</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>

</body>
</html>
