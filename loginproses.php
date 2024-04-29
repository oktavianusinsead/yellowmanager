<?php

$mysqli = new mysqli("localhost","yellow","yellow123","yellow");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  
}
// Check connection

$username=$_POST['username'];
$password=$_POST['password'];






// Free result set


$login="SELECT l.*,p.position,c.locationname FROM sky_loginmanager l
left outer join sky_position p on p.positionid = l.positionid
left outer join sky_location c on c.locationid = l.locationid
 WHERE username='".$username."' and password='".$password."'";
$result = $mysqli -> query($login);
//$result = $conn -> query($login);
// Associative array
$row = $result -> fetch_assoc();
printf ("%s (%s)\n", $row["username"], $row["password"]);
//$row = $result -> fetch_assoc();
//echo $row["username"];
$result -> free_result();

$mysqli -> close();
?>