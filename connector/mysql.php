<?php

class DataBase
{

  private $servername = "localhost";
  private $username = "user";
  private $password = "XjOUympY-[MS19KT";
  private $db = "szakdoga";
  public static $conn;

  function __construct()
  {
    // Create connection
    self::$conn = new mysqli($this->servername, $this->username, $this->password, $this->db);

    // Check connection
    if (self::$conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }

    self::$conn->set_charset("utf8");
  }

  function uploadUser($email, $password){
    $sql = "INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$password')";
    self::$conn->query($sql);
  }

}



?>