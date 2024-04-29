<?php

$mysqli = new mysqli("localhost","yellow","yellow123","yellow");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>