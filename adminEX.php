<?php

session_start();
if ($_SESSION['login'] != "True") {
  $error= "Sorry You Have To Login First.";
  echo("<script>alert(\"$error\")</script>");
}
?>
