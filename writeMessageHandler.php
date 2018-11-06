<?php
session_start();
$login = $_SESSION['username'];
require_once 'messagesDAO.php';
$dao = new messagesDAO();

$user = $_POST['to'];
$message = $_POST['message'];

$dao->createMessage ($login, $user, $message);
header('Location: writeMessage.php');