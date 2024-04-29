<?php
include "config.php";
$jml="15";
$transactionno=$_POST['transactionno'];
//$tgl=$_POST['tgl'];
$platno=$_POST['platno'];
$locationid="19";
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");
$totaltransaksi=0;
$jml=1;
echo "Transaction No : ".$transactionno." <br>
Tanggal : ".$waktu." <br>

Plat No : ".$platno." <br>
Order   : <br>
<br>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){

$login2=mysql_query("SELECT * FROM sky_itemprice WHERE itemid='".$selected."' and locationid='".$locationid."'");

$r3=mysql_fetch_array($login2);


$login3=mysql_query("SELECT * FROM sky_item WHERE itemid='".$selected."'");
$r4=mysql_fetch_array($login3);

$totaltransaksi=$totaltransaksi+$r3['price'];
$login=mysql_query("INSERT INTO sky_transaction (locationid,tiketno,datetransact,timein,itemid,cost,total,nopolisi) VALUES
               ('19','".$transactionno."','".$waktu."','".$jam."','".$selected ."','".$r3['price']."','".$totaltransaksi."','".$platno."')");
//                }
echo $jml.". ".$r4['itemname']." <br>
";
$jml++;
}

echo "
<br>
<img src='http://barcode.tec-it.com/barcode.ashx?translate-esc=off&data=".$transactionno."&code=Code128&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=000000&bgcolor=FFFFFF&qunit=Mm&quiet=0' alt='Barcode Generator TEC-IT'/>
<br>
<a href='javascript:window.print()'><img src='images/icons/black/file.png' alt='print this page' id='print-button' /></a>
";


?>