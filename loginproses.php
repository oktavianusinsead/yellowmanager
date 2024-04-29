<?php


//session_start();
$servername = "202.10.36.23";
$username = "yellow";
$password = "yellow123";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
$username=$_POST['username'];
$password=$_POST['password'];

$login="SELECT l.*,p.position,c.locationname FROM sky_loginmanager l
left outer join sky_position p on p.positionid = l.positionid
left outer join sky_location c on c.locationid = l.locationid
 WHERE username='".$username."' and password='".$password."'";

$result = $mysqli -> query($login);

// Associative array
$row = $result -> fetch_assoc();
printf ("%s (%s)\n", $row["username"], $row["password"]);

// Free result set
$result -> free_result();

$mysqli -> close();


}
?>