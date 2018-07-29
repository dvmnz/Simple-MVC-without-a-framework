<?php
//a db class for connecting to the database
  class Db {
    private static $instance = NULL;

    public static function getInstance() {
      if (!isset(self::$instance)) {
       
        self::$instance = mysqli_connect("localhost", "root", "root", "assignment2");
      }
      return self::$instance;
    }
  }

?>