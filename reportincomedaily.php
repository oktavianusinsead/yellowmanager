<?php
include "config.php";
session_start();

$tgl_faktur=$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl];
					  $startday=$tgl_faktur." 07:00:00";
					  
					  $endday = date('Y-m-d', strtotime($startday . ' +1 day')) ." 02:00:00";

					  $tglawal="2016-11-26 07:00:00";
                       $tglakhir="2016-12-25 01:00:00";
					  $login3=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");

$r3=mysql_fetch_array($login3);

$login4=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('5') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r4=mysql_fetch_array($login4);


 $login2=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid not in ('6') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r2=mysql_fetch_array($login2);

$login1=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('6') and t.locationid='19' and datetransact between '".$startday."' and '".$endday."'");
$r1=mysql_fetch_array($login1);


//Today

$login1a=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$r1a=mysql_fetch_array($login1a);



$login1b=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('5') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$r1b=mysql_fetch_array($login1b);

$login1c=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('6') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$r1c =mysql_fetch_array($login1c);


$login1d=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('12') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$r1d =mysql_fetch_array($login1d);

$login1e=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('11') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$r1e =mysql_fetch_array($login1e);

//jasa tambahan

//cucimesin
$sql1=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('13') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row =mysql_fetch_array($sql1);

//hand wax
$sql2=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('14') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row2 =mysql_fetch_array($sql2);


//glass wax front
$sql3=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('15') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row3 =mysql_fetch_array($sql3);

//wax all

$sql4=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('16') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row4 =mysql_fetch_array($sql4);

//jamur front

$sql5=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('17') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row5 =mysql_fetch_array($sql5);


//jamur all

$sql6=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('18') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row6 =mysql_fetch_array($sql6);


//fogging

$sql7=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('774') and t.datetransact between '".$startday."' and '".$endday."' and t.locationid='19'");
$row7 =mysql_fetch_array($sql7);
			      $html.="
				<p>Income Yellow : Rp. ".rupiah($r1a[total])."</p>
				<p>Cuci Mobil : ".rupiah($r1c[total])."</p>
				<p>Jasa Tambahan</p>
				<p>- Cuci Mesin   : ".rupiah($row[total])."</p>
				<p>- Hand Wax     : ".rupiah($row2[total])."</p>
				<p>- Glass Wax Front : ".rupiah($row3[total])."</p>
				<p>- Glass Wax All   : ".rupiah($row4[total])."</p>
				<p>- Anti Jamur Front : ".rupiah($row5[total])."</p>
				<p>- Anti Jamur All   : ".rupiah($row6[total])."</p>
				<p>- Cabin Fogging : ".rupiah($row7[total])."</p>
				
				
				
				
				<p></p>
				<p>Garansi Hujan:  ".rupiah($r1d[total])."</p>
				<p>Compliment   :  ".rupiah($r1e[total])."</p>
				<p></p>
				
				<br>
				<p>Income Cube Mart: Rp. ".rupiah($r1b[total])."</p>

			    
				
					     
					";
 
		

echo $html;
?>