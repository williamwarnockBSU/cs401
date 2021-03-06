<?php
  session_start();

  require_once 'loginDAO.php';
  $dao = new loginDAO();

  $login = $_POST['login'];
  $password = $_POST['password'];

  //$hash = hash("SHA256", $password . $login);
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $userExists = $dao->getUser($login, $hash);

  foreach ($userExists as $user) {
    if(password_verify($password, $user['userPassword'])) {
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
