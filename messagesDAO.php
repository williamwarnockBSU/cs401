<?php

class messagesDAO {
  private $host = "us-cdbr-iron-east-01.cleardb.net";
  private $db = "heroku_f2e5ca38f7d8c7b";
  private $user = "b685d0eb9b1c8d";
  private $pass = "59c1af00";

  public function __construct () {
    
  }

  public function getConnection () {
    $conn= new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    return $conn;
  }

  public function getMessages ($user) {
    $conn = $this->getConnection();
    return $conn->query("select * from messages where receiver = \"". trim($user) ."\" and trash != 1;", PDO::FETCH_ASSOC);
  }

  public function getTrash ($user) {
    $conn = $this->getConnection();
    return $conn->query("select * from messages where receiver = \"". trim($user) ."\" and trash != 0;", PDO::FETCH_ASSOC);
  }

  public function numMessages ($user) {
    $conn = $this->getConnection();
    return $conn->query("select count(*) from (select * from messages where receiver = \"". trim($user) ."\" and trash != 1) as x;", PDO::FETCH_ASSOC);
  }

  public function getSentMessages ($user) {
    $conn = $this->getConnection();
    return $conn->query("select * from messages where sender = \"". trim($user) ."\" and trash != 1;", PDO::FETCH_ASSOC);
  }

}