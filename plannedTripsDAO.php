<?php

class plannedTripsDAO {
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

  public function getUserTrips ($userName) {
    $conn = $this->getConnection();
    return $conn->query("select * from usertrips where user1 = \"". trim($userName) ."\";", PDO::FETCH_ASSOC);
  }

  public function getTripInfo ($tripNum) {
    $conn = $this->getConnection();
    return $conn->query("select * from trips where tripID = \"". trim($tripNum) ."\";", PDO::FETCH_ASSOC);
  }

}