<?php
session_start();

include "config.php";
$transactionno=$_POST['transactionno'];
$tgl2=$_POST['tgl'];
$locationid=$_POST['locationid'];
$userid=$_POST['userid'];
$amount=$_POST['amount'];
$des=$_POST['des'];
$costid=$_POST['costid'];
$requesttype=$_POST['requesttype'];
$tgl = date("Y-m-d", strtotime($tgl2));

//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.
if($requesttype=='Cash')
{
$login=mysql_query("INSERT INTO sky_pettycash (pettycashno,pettycashdate,locationid,amount,keperluan,userid,costid) VALUES
               ('".$transactionno."','".$tgl."','".$locationid."','".$amount ."','".$des."','".$userid."','".$costid."')");

}
else
{
	$login=mysql_query("INSERT INTO sky_costoperasional (costno,costid,costname,locationid,costdate,cost,des,qty,totalharga) VALUES
               ('".$transactionno."','".$costid."','".$des."','".$locationid ."','".$waktu."','".$amount."','".$des."','0',,'".$amount."')))");

}
//                }


header("Location: index2.php");


?>