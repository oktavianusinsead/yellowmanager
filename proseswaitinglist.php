<?php
include "config.php";

session_start();

$transactionno=$_POST['transactionno'];

foreach($_POST['transactionno'] as $selected){
//date_default_timezone_set('Asia/Jakarta');
$login=mysql_query("update sky_transaction set waitinglist='x' , waitinglistdate=now()
 WHERE tiketno='".$selected."'");
header("Location: indexkasir.php");

echo $selected;
}





?>