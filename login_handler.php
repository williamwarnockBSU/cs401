<?php
session_start();

  $login = $_POST['login'];
  $password = $_POST['password'];

  if ($login == 'conrad' && $password == 'abc123') {
    $_SESSION['logged_in'] = true;
    header('Location: mainPage.php');
    exit;
  }
  $_SESSION['logged_in'] = false;
  $_SESSION['message'] = "Username or password invalid";
  header('Location: index.php');
  exit;
