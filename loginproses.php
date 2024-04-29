<?php
include "config.php";

session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$login=mysql_query("SELECT l.*,p.position,c.locationname FROM sky_loginmanager l
left outer join sky_position p on p.positionid = l.positionid
left outer join sky_location c on c.locationid = l.locationid
 WHERE username='".$username."' and password='".$password."'");
$r=mysql_fetch_array($login);
$user=$r['username'];
$userid=$r['loginid'];
$location=$r['locationname'];
$position=$r['position'];
$fullname=$r['fullname'];
$positionid=$r['positionid'];
$locationid=$r['locationid'];

if($user=="")
{
header("Location: index.php");
}
else
{
  if($position=="Kasir")
  {
$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();
$_SESSION['userid'] = $userid;
$_SESSION['username'] = $user;
$_SESSION['fullname'] = $fullname;
$_SESSION['location'] = $location;
$_SESSION['position'] = $position;
$_SESSION['locationid'] = $locationid;
$_SESSION['positionid'] = $positionid;
 header("Location: indexkasir.php");
 }
 else
 {

$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();
$_SESSION['userid'] = $userid;
$_SESSION['username'] = $user;
$_SESSION['fullname'] = $fullname;
$_SESSION['location'] = $location;
$_SESSION['position'] = $position;
$_SESSION['locationid'] = $locationid;
$_SESSION['positionid'] = $positionid;
header("Location: index2.php");
}

}
?>