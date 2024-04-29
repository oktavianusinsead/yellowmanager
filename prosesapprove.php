<?php
session_start();

include "config.php";
$messageid=$_GET['messageid'];
$userid=$_GET['userid'];
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.

$login=mysql_query("Update  sky_messageadmin set approve='x' ,approvedate='".$waktu."', approveby='".$userid."' where messageid='".$messageid."'");
//                }


header("Location: index2.php");


?>