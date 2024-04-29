<?php
include "config.php";
session_start();
$bln=$_POST[thn]."-".$_POST[bln];
$next=$_POST[thn]."-".$_POST[bln]+1;

					  $startday=$bln."-26 07:00:00";
					  
					 $endday = date('Y-m-d', strtotime($startday . ' +1 month')) ." 02:00:00";

					  $tglawal="2017-05-26 07:00:00"; 
                       $tglakhir="2017-06-25 01:00:00";
					 $login3=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r3=mysql_fetch_array($login3);

$logincube=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('5') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$cube=mysql_fetch_array($logincube);


 $login2=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid not in ('6','11','12') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r2=mysql_fetch_array($login2);

$login1=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('6') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r1=mysql_fetch_array($login1);


//Total Cuci Mobil
$login4=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r4=mysql_fetch_array($login4);


//Total Garansi
$login5=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='12' and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r5=mysql_fetch_array($login5);


//Total Compliment
$login6=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='11' and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r6=mysql_fetch_array($login6);

//Cuci Mesin
$login7=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid='1'  and t.itemid in ('13') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r7=mysql_fetch_array($login7);

//HandWax
$login8=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid ='1' and t.itemid in ('14') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r8=mysql_fetch_array($login8);

//Anti Jamur
$login9=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid ='1' and t.itemid in ('17','18') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r9=mysql_fetch_array($login9);

//Glass Wax
$login10=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid='1'  and t.itemid in ('15','16') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r10=mysql_fetch_array($login10);

//Fogging
$login11=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid ='1' and t.itemid in ('774') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r11=mysql_fetch_array($login11);
			      $html.="
			    <p>Income Cuci Mobil : ".rupiah($r3[total])."</p>
						<p>  Total Cuci Mobil : ".rupiah($r4[total])."</p>
						<p>  Total Garansi : ".rupiah($r5[total])."</p>
						<p>  Total Compliment : ".rupiah($r6[total])."</p>

						<br>
				<p>Income Jasa Tambahan: Rp. ".rupiah($r2[total])."</p>
				<p>  Total Cuci Mesin: ".rupiah($r7[total])."</p>
				<p>  Total Hand Wax: ".rupiah($r8[total])."</p>
				<p>  Total Anti Jamur: ".rupiah($r9[total])."</p>
				<p>  Total Glass Wax: ".rupiah($r10[total])."</p>
				<p>  Fogging: ".rupiah($r11[total])."</p>

				<br>";
				$incomecarwash=$r3[total]+$r2[total];
				$html.="<p>Income Car Wash: Rp. ".rupiah($incomecarwash)."</p>
				 
				<p>Income Cube Mart: Rp. ".rupiah($cube[total])."</p>
				<br><br>";
				$totalincome=$r3[total]+$r2[total]+$cube[total];
				$html.="<p>Total Income: Rp. ".rupiah($totalincome)."</p>
				 
					        
					";
 
		

echo $html; 
?>