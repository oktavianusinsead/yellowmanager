<?php
include "config.php";

session_start();

$transactionno=$_POST['transactionno'];

foreach($_POST['transactionno'] as $selected){
date_default_timezone_set('Asia/Jakarta');
$login=mysql_query("update set sky_transaction
 WHERE transactionno='".$selected."'");
header("Location: finishorder.php");
}





?>