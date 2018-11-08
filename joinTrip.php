<?php

$id = $_GET['id'];
$tripID = $_GET['tripNum'];

require_once 'plannedTripsDAO.php';
$dao = new plannedTripsDAO();
$dao->joinTrip($id, $tripID);

header('Location: tripsBoard.php');
exit;