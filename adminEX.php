<?php

session_start();
if ($_SESSION['login'] != "True") {
  $error= "Sorry You Have To Login First.";
  echo("<script>alert(\"$error\")</script>");
}

else {
  if ($_SESSION['user_Role'] != "Admin") {
    $error="Sorry You Cannot View This Page.";
    echo("<script>alert(\"$error\")</script>");
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
<div role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button"></button>
    </div>
  </div>
</div>

</body>
</html>
