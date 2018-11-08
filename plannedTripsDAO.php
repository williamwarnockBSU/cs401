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
    return $conn->query("select * from trips where user1 = \"". trim($userName) ."\" or user2 = \"". trim($userName) ."\";", PDO::FETCH_ASSOC);
  }

  public function getTripInfo ($tripNum) {
    $conn = $this->getConnection();
    return $conn->query("select * from trips where tripID = \"". trim($tripNum) ."\";", PDO::FETCH_ASSOC);
  }

  public function getNumTrips ($user) {
    $conn = $this->getConnection();
    return $conn->query("select count(*) from (select tripID from trips where user1 = \"". trim($user) ."\" or user2 = \"". trim($user) ."\") as x;", PDO::FETCH_ASSOC);
  }

  public function getNextTrip ($user) {
    $conn = $this->getConnection();
    return $conn->query("select *
    from 
      trips
    where
      user1 = \"". trim($user) ."\" or user2 = \"". trim($user) ."\";", PDO::FETCH_ASSOC);
  }

  public function listTripsNotFull ($user) {
    $conn = $this->getConnection();
    return $conn->query("select *
    from 
      trips
    where
      user2 is NULL and user1 != \"". trim($user) ."\";", PDO::FETCH_ASSOC);
  }

  // public function createTrip ($user, $startLocation, $endLocation, $startDate, $endDate) {
  //   $conn = $this->getConnection();
    
  //   $saveQuery =
  //       "INSERT INTO trips
  //       (startLocation, endLocation, startDate, endDate, user1)
  //       VALUES
  //       (:startLocation, :endLocation, :startDate, :endDate, :user);";

  //   $q = $conn->prepare($saveQuery);
  //   $q->bindParam(":user", $user);
  //   $q->bindParam(":startLocation", $startLocation);
  //   $q->bindParam(":endLocation", $endLocation);
  //   $q->bindParam(":startDate", $startDate);
  //   $q->bindParam(":endDate", $endDate);
  //   echo "$q";
  //   $q->execute();

  // }

  public function createTrip($user, $startLocation, $endLocation, $startDate, $endDate) {
    $conn = $this->getConnection();

    $saveQuery = 
    "INSERT INTO trips
    (startLocation, endLocation, startDate, endDate, user1)
    VALUES
    (:startLocation, :endLocation, :startDate, :endDate, :user);";

    $q = $conn->prepare($saveQuery);
    $q->bindParam(":user", $user);
    $q->bindParam(":startLocation", $startLocation);
    $q->bindParam(":endLocation", $endLocation);
    $q->bindParam(":startDate", $startDate);
    $q->bindParam(":endDate", $endDate);

    $q->execute();
  }

  public function joinTrip ($id, $tripID) {
    $conn = $this->getConnection();

    $saveQuery = 
    "UPDATE trips
    SET user2 = :id
    WHERE tripID = :tripID;";

    $q = $conn->prepare($saveQuery);
    $q->bindParam(":id", $id);
    $q->bindParam(":tripID", $tripID);

    $q->execute();

  }

}