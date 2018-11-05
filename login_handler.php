<?php
  session_start();

  require_once 'loginDAO.php';
  $dao = new loginDAO();

  $login = $_POST['login'];
  $password = $_POST['password'];

  $userExists = $dao->getUser($login, $password);

  foreach ($userExists as $user) {
    if ($user['count(*)'] != 0) {
      $_SESSION['username'] = $login;
      $_SESSION['logged_in'] = true;
      header('Location: mainPage.php');
      exit;
    }
  }
  
  $_SESSION['logged_in'] = false;
  $_SESSION['message'] = "Username or password invalid";
  header('Location: index.php');
  exit;
