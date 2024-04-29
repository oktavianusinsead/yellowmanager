<?php
session_start();

include "config.php";
$transactionno=$_POST['transactionno'];
$tgl=$_POST['tgl'];
$locationid=$_POST['locationid'];
$userid=$_POST['userid'];
$itemid=$_POST['itemid'];
$qty=$_POST['qty'];
$des=$_POST['des'];
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.

$login=mysql_query("INSERT INTO sky_stockrequest (requestno,requestdate,locationid,itemid,qty,des,requestby) VALUES
               ('".$transactionno."','".$waktu."','".$locationid."','".$itemid ."','".$qty."','".$des."','".$userid."')");
//                }


header("Location: index2.php");


?>