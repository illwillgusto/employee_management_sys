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
