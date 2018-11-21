<?php
  session_start();

  require_once 'loginDAO.php';
  $dao = new loginDAO();

  $login = $_POST['username'];
  $password = $_POST['userpassword'];

  $pattern='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  $success = preg_match($pattern, $login);

  //Check for empty password
  if ($password == "") {
    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "Please type in password";
    header('Location: index.php');
  } elseif ($success) {
    $hash = hash("SHA256",$password . $login);

    //Check to see if user exists first
    $userExists = $dao->checkForUser($login);
    
    foreach ($userExists as $user) {
      if ($user['count(*)'] != 0) {
        $_SESSION['logged_in'] = false;
        $_SESSION['message'] = "This username has been taken";
        header('Location: index.php');
        exit;
      }
    }

    $dao->createUser($login, $hash);

    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "User Added";
    header('Location: index.php');
	} else {
    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "Please type in a valid email";
    header('Location: index.php');
  }