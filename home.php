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

</body>
</html>
