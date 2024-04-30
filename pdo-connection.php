<?php
// method to structure to establish a connection to the database
    class Connect
    {
      //Properties
      var $hostname;
      var $database;
      var $username;
      var $password;

      //Public properties
      public $connect;

      //establish a database connection using the PDO (PHP Data Objects)
      public function connection ($hostname, $database, $username, $password);
    }
?>
