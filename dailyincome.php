<?php
include "config.php";
session_start();
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Sales List</div>
    <div class='right'>
      <a href='#' data-panel='right' class='item-link item-content open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>
  <!-- Page, data-page contains page name-->
  <div data-page='tabs' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content about'>
	<div class='content-block-title'>Daily Income per Location - ".$_SESSION['position']."</div>
      <div class='content-block'>";
      
    
      $html.="<div class='card'>
		<div class='card-header'>PIK</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<!-- Buttons row as tabs controller -->
				<div class='buttons-row'>
				  <!-- Link to 1st tab, active -->
				  <a href='#tab1' class='tab-link active button'>Today</a>
				  <!-- Link to 2nd tab -->
				  <a href='#tab2' class='tab-link button'>Income in Periode</a>
				</div>
				<!-- Tabs, tabs wrapper -->
				  <div class='tabs'>
					<!-- Tab 1, active by default -->
					                
					<div id='tab1' class='tab active'>
					  <div class='content-block'>";

					  $startday=date('Y-m-d')." 07:00:00";
					  $endday=date('Y-m-d',strtotime("1 days"))." 02:00:00";

					  $tglawal="2017-05-26 07:00:00";
                       $tglakhir="2017-06-25 01:00:00";

$login3=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r3=mysql_fetch_array($login3);

$logincube=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('5') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$cube=mysql_fetch_array($logincube);


 $login2=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid not in ('6') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r2=mysql_fetch_array($login2);

$login1=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and i.itemid in ('6') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r1=mysql_fetch_array($login1);


//Total Cuci Mobil
$login4=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r4=mysql_fetch_array($login4);


//Total Garansi
$login5=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='12' and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r5=mysql_fetch_array($login5);


//Total Compliment
$login6=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='11' and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r6=mysql_fetch_array($login6);

//Cuci Mesin
$login7=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid='1'  and t.itemid in ('13') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r7=mysql_fetch_array($login7);

//HandWax
$login8=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid ='1' and t.itemid in ('14') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r8=mysql_fetch_array($login8);

//Anti Jamur
$login9=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid ='1' and t.itemid in ('17','18') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r9=mysql_fetch_array($login9);

//Glass Wax
$login10=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid='1'  and t.itemid in ('15','16') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r10=mysql_fetch_array($login10);

//Fogging
$login11=mysql_query("SELECT count(transactionid) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid ='1' and t.itemid in ('774') and t.locationid='19' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r11=mysql_fetch_array($login11);



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
				
					     
					  </div>
					</div>
					<!-- Tab 2 -->
					<div id='tab2' class='tab'>
					  <div class='content-block'>
						
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

				<br>
				
				<p>Income Cube Mart: Rp. ".rupiah($cube[total])."</p>
					 </div>
					</div>
					<!-- Tab 3 -->
					</div>
				<!---->
			</div>
		  </div>
		</div>";
 
		

      $html.="</div>
	  
    </div>
  </div>
</div>";
echo $html;
?>