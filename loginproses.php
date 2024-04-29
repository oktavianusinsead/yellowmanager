<?php

$mysqli = new mysqli("localhost","yellow","yellow123","yellow");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// Check connection
echo "Data Refresh".$mysqli;
$username=$_POST['username'];
$password=$_POST['password'];

$login="SELECT l.*,p.position,c.locationname FROM sky_loginmanager l
left outer join sky_position p on p.positionid = l.positionid
left outer join sky_location c on c.locationid = l.locationid
 WHERE username='".$username."' and password='".$password."'";

//$result = $conn -> query($login);

//$row = $result -> fetch_assoc();
//echo $row["username"];
?>