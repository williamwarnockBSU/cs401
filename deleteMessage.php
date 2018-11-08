<?php

$id = $_GET['id'];

require_once 'messagesDAO.php';
$dao = new messagesDAO();
$dao->deleteMessage ($id);

header('Location:messages.php');
exit;