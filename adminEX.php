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

    include ('pdo-connection.php');
    include ('database-config.php');


    $dbuser = $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost', $dbname, $dbuser, $dbpass);

    /* retrieval of comprehensive employee information from multiple tables based on a specific
    employee ID ('$e_id')
    it pulls data from 3 tables: 'login_info', 'employee_personal_info', & 'employee_professional_info'.
    Each table will have an 'id' field to correspond to the employee's ID.
    this will allow for a consistent and complete data fetch */
    $sql = "SELECT * FROM login_info,employee_personal_info,employee_professional_info WHERE login_info.Employee_id = '$e_id'
    AND employee_personal_info.id = '$e_id' AND employee_professional_info.id = '$e_id'";


    $data = $dbcon->query($sql);

    // PDO (PHP Data Objects), a method for database access that provides a flexible way to access and manage database connections in PHP
    $row = $data->fetch(PDO::FETCH_ASSOC);

    // fetched data is stored in an array '$row'
    $name = $row['Name'];
    $id = $row['id'];
    $nid = $row['NID'];
    $department = $row['Department'];
    $designation = $row['Designation'];
    $email = $row['Email'];
    $contact = $row['Phone'];
    $address = $row['Address'];
    $gender = $row['Gender'];
    $blood_group = $row['Blood_group'];
    $dob = $row['Date_of_Birth'];
    $jd = $row['Joining_date'];
    $image = $row['Image'];

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
