<?php
session_start();

include "config.php";
$transactionno=$_POST['transactionno'];
$tgl=$_POST['tgl'];
$locationid=$_POST['locationid'];
$userid=$_POST['userid'];
$title=$_POST['title'];
$message=$_POST['message'];
$messagepic=$_POST['pic'];
$photopic=$transactionno.".jpg";
move_uploaded_file($_FILES["pic"]["tmp_name"],"images/pesan/".$photopic);

//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.

$login=mysql_query("INSERT INTO sky_messageadmin (messageno,messagedate,locationid,title,message,messagepic,useradd,dateadd) VALUES
               ('".$transactionno."','".$waktu."','".$locationid."','".$title."','".$message ."','".$photopic."','".$userid."','".$waktu."')");
//                }


header("Location: index2.php");


?>