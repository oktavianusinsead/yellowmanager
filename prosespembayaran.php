<?php
session_start();

include "config.php";
$transactionno=$_POST['transactionno'];
$tgl=$_POST['tgl'];
$costid=$_POST['costid'];
$locationid=$_POST['locationid'];
$userid=$_POST['userid'];
$amount=$_POST['amount'];
$des=$_POST['des'];
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.

$login=mysql_query("INSERT INTO sky_costoperasional (costno,costid,costname,locationid,costdate,cost,des) VALUES
               ('".$transactionno."','".$costid."','".$des."','".$locationid ."','".$waktu."','".$amount."','".$des."')");
//                }


header("Location: index2.php");


?>