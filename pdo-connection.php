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
      public function connection ($hostname, $database, $username, $password)
      {
        //class properties to provided argument, specifying the server where the database resides
        $this->hostname=$hostname;
        $this->database=$database;
        $this->username=$username;
        $this->password=$password;

        //PDO Connection:
        $connect= new PDO("mysql:host=$hostname;dbname=$database", $username, $password, array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));



      }
    }
?>
