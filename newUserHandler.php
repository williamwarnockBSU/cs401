<?php
  session_start();

  require_once 'loginDAO.php';
  $dao = new loginDAO();

  $login = $_POST['username'];
  $password = $_POST['userpassword'];

  $pattern='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

  $success = preg_match($pattern, $login);
  if ($success) {
    $dao->createUser($login, $password);

    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "User Added";
    header('Location: index.php');
	} else {
    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "Please type in a valid email";
    header('Location: index.php');
  }