<?php
include "config.php";
session_start();
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Target Sales List</div>
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
	<div class='content-block-title'>Target Sales per Location - ".$_SESSION['position']."</div>
      <div class='content-block'>";
      
      if($_SESSION['position']=="Manager Outlet")
      {
      $html.="<div class='card'>
		<div class='card-header'>Alam Sutera</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<!-- Buttons row as tabs controller -->
				<div class='buttons-row'>
				  <!-- Link to 1st tab, active -->
				  <a href='#tab1' class='tab-link active button'>Bulan Ini</a>
				  <!-- Link to 2nd tab -->
				  <a href='#tab2' class='tab-link button'>Bulan Lalu</a>
				</div>
				<!-- Tabs, tabs wrapper -->
				  <div class='tabs'>
					<!-- Tab 1, active by default -->
					<div id='tab1' class='tab active'>
					  <div class='content-block'>";
					  $login=mysql_query("SELECT * FROM sky_location

                                         WHERE locationid='".$_SESSION['locationid']."'");

$r=mysql_fetch_array($login);
						$html.="<p>".rupiah($r['targetsales'])."</p>
					  </div>
					</div>
					<!-- Tab 2 -->
					<div id='tab2' class='tab'>
					  <div class='content-block'>";
					$login=mysql_query("SELECT * FROM sky_location

                                         WHERE locationid='".$_SESSION['locationid']."'");

$r=mysql_fetch_array($login);
						$html.="<p>".rupiah($r['targetsales'])."</p>
					  </div>
					</div>
					<!-- Tab 3 -->
					</div>
				<!---->
			</div>
		  </div>
		</div>";
      }
      else
      {
        
         $login2=mysql_query("Select * from sky_location order by locationid");

while($r2=mysql_fetch_array($login2))

{
        $html.="<div class='card'>
		<div class='card-header'>".$r2['locationname']."</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<!-- Buttons row as tabs controller -->
				<div class='buttons-row'>
				  <!-- Link to 1st tab, active -->
				  <a href='#tab4' class='tab-link active button'>Bulan Ini</a>
				  <!-- Link to 2nd tab -->
				  <a href='#tab5' class='tab-link button'>Bulan Lalu</a>
				</div>
				<!-- Tabs, tabs wrapper -->
				 <div class='tabs-animated-wrap'>
				  <div class='tabs'>
					<!-- Tab 1, active by default -->
					<div id='tab4' class='tab active'>
					  <div class='content-block'>";
					  $login=mysql_query("SELECT * FROM sky_location

                                         WHERE locationid='".$r2['locationid']."'");

$r=mysql_fetch_array($login);


 $startday=$bln."-26 07:00:00";
					  
					 $endday = date('Y-m-d', strtotime($startday . ' +1 month')) ." 02:00:00";

					  $tglawal="2017-01-26 07:00:00";
                       $tglakhir="2017-02-25 01:00:00";

                       $tglawal2="2016-12-26 07:00:00";
                       $tglakhir2="2017-01-25 01:00:00";
					 $login3=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='".$r2['locationid']."' and datetransact between '".$tglawal."' and '".$tglakhir."'");
$r3=mysql_fetch_array($login3);
						
$selisih=$r[targetsales]-$r3[total];


 $login3a=mysql_query("SELECT sum(cost) as total FROM `sky_transaction` t
left outer join sky_item i on i.itemid=t.itemid

WHERE i.itemtypeid in ('1') and t.itemid='6' and t.locationid='".$r2['locationid']."' and datetransact between '".$tglawal2."' and '".$tglakhir2."'");
$r3a=mysql_fetch_array($login3a);


$selisiha=$r[targetsales]-$r3a[total];
						$html.="<p>Target Sales : ".rupiah($r['targetsales'])."</p>

						<p>Penjualan : ".rupiah($r3['total'])."</p>
						<p>Selisih : ".rupiah($selisih)."</p>
					  </div>
					</div>
					<!-- Tab 2 -->
					<div id='tab5' class='tab'>
					  <div class='content-block'>";

					$login=mysql_query("SELECT * FROM sky_location

                                         WHERE locationid='".$r2['locationid']."'");

$r=mysql_fetch_array($login);
						$html.="<p>Target Sales : ".rupiah($r['targetsales'])."</p> 

						<p>Penjualan : ".rupiah($r3a['total'])."</p>
						<p>Selisih : ".rupiah($selisiha)."</p>
						 </div>
					</div>
					</div>
					</div>
				<!---->
			</div>
		  </div>
		</div>";
            }
      }

		

      $html.="</div>
	  
    </div>
  </div>
</div>";
echo $html;
?>