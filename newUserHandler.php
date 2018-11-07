<?php
  session_start();

  require_once 'loginDAO.php';
  $dao = new loginDAO();

  $login = $_POST['username'];
  $password = $_POST['userpassword'];

  $dao->createUser($login, $password);

  $_SESSION['logged_in'] = false;
  $_SESSION['message'] = "User Added";
  header('Location: index.php');
  exit;