<?php
session_start();
include ();
include ();

$dbuser = $database_user;
$dbpass = $database_pass;
$dbname = $database_name;

$dbcon = $connection_object->connection('localhost', $dbname, $dbuser, $dbpass);
?>
