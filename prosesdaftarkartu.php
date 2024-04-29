<?php
session_start();

include "config.php";
$messageid=$_GET['messageid'];
$userid=$_GET['userid'];
$staffid=$_POST[staffid];
$cardid=$_POST[cardid];
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.

$sql1 = "SELECT *  FROM sky_staff where staffid ='".$staffid."'
                                                ";
		                                      $result1 = mysql_query($sql1);
		                                      $row1=@mysql_fetch_array($result1);

$login=mysql_query("INSERT INTO sky_staffcard (cardid,staffid,locationid,gambar) VALUES
                ('".$cardid."','".$staffid."','19','".$row1[picfile]."')");
//                }


header("Location: index2.php");


?>