<?php
  session_start();

  require_once 'plannedTripsDAO.php';
  $dao = new plannedTripsDAO();

  $user = $_SESSION['username'];
  $startLocation = $_POST['createStartLocation'];
  $endLocation = $_POST['createDestination'];
  $startDate = $_POST['createstartDate'];
  $endDate = $_POST['createEndDate'];

  echo "$startDate : $endDate";

  $dao->createTrip($user, $startLocation, $endLocation, $startDate, $endDate);

  //header('Location: tripsBoard.php');