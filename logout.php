<?php
session_start();


  session_destroy();

  unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['fullname']);
unset($_SESSION['location']);
unset($_SESSION['position']);
  header("Location: index.php");
  exit;

?>