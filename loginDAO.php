<?php

class loginDAO {
  private $host = "us-cdbr-iron-east-01.cleardb.net";
  private $db = "heroku_f2e5ca38f7d8c7b";
  private $user = "b685d0eb9b1c8d";
  private $pass = "59c1af00";

  public function __construct () {
    
  }

  public function getConnection () {
       $conn= new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
    return $conn;
  }

  public function getUser ($userName, $password) {
    $conn = $this->getConnection();
    return $conn->query("select count(*) from (select userEmail, userPassword from users where userEmail = \"". trim($userName) ."\" and userPassword = \"". trim($password) ."\") as x;", PDO::FETCH_ASSOC);
  }

}