<?php
session_start();

include "config.php";
$staffid=$_POST['staffid'];
$sts=$_POST['sts'];
$day="10";
$active="x";

//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.

$login=mysql_query("INSERT INTO sky_staffschedule (staffid,rosterno,day,active) VALUES
               ('".$staffid."','".$sts."','".$day."','".$active ."')");
//                }


header("Location: index2.php");


?>