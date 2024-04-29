<?php
$mysqli = new mysqli("localhost","yellow","yellow123","yellow");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  
}
$userid=1;

for($i=1;$i<=$_POST['qty'];$i++)
{
$jml="15";
$transactionno=$_POST['transactionno'];
//$tgl=$_POST['tgl'];
$platno=$_POST['name'];
$locationid="22";
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
                                          $jam= date("H:i:s");
$totaltransaksi=0;
$jml=1;
echo "
<img src='images/ic_launcher2.png' width='260px' alt='Yellow'/><br> <br>
Transaction No : ".$transactionno." <br>
Tanggal : ".$waktu." <br>

Name : ".$platno." <br>
<br>";
// Loop to store and display values of individual checked checkbox.


//                }


$notransaksi="CP".$i.date("ymdHis");

echo "
<br>
<img src='http://barcode.tec-it.com/barcode.ashx?translate-esc=off&data=".$notransaksi."&code=Code128&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=000000&bgcolor=FFFFFF&qunit=Mm&quiet=0' alt='Barcode Generator TEC-IT'/>
<br>
Voucher Super Wash ini hanya berlaku 1 kali<br><br>
";

$login="INSERT INTO sky_compliment (complimentdate,locationid,compliment,userid,redeem) VALUES
               ('".$waktu."','11','".$notransaksi."','".$userid ."','".$_POST['name']."')";
echo $login;
$result = $mysqli -> query($login);

}

?>