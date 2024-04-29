<?php
include "config.php";

date_default_timezone_set('Asia/Jakarta');
                        $waktuawal= date("Y-m-d");
$notransaksi=date("ymdHis");

$html.="
<script>
function myFunction() {
    window.print();
}
</script>
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Staff List</div>
    <div class='right'>
      <a href='#' data-panel='right' class='item-link item-content open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>  
  <!-- Page, data-page contains page name-->
  <div data-page='toggle' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content about'>
  <div class='content-block-title'>Staff Absensi List</div>
      <div class='content-block'>


               
                <div class='card-header'>Klik untuk detail karyawan</div>
      <div class='card-content'>
      <div class='card-content-inner'>
        

                                <div class='list-block accordion-list'>
          <ul>

                                  ";
$waktu= date("Y-m-d"). " 23:59:59";
$waktu2 = date("Y-m-d",strtotime("-1 days"));
$waktu2a=$waktu2 ." 23:59:59"; 
$bulanini=date("Y-m");
$bulandepan=date("Y-m",strtotime("-1 month"));

$periode1=$bulandepan."-26 00:00:00";
$periode2=$bulanini."-25 01:30:00";

                                          $login=mysql_query("SELECT *  FROM sky_staff
                                         WHERE locationid='19' and inactive not in ('x') and positionid='".$_GET['positionid']."'  order by staffname ASC");

while($r=mysql_fetch_array($login))

{
                      
 $login2=mysql_query("SELECT count(absensiid) as total FROM sky_absensi where status='Masuk' and staffid='".$r[staffid]."' and tglabsensi between '".$periode1."' and '".$periode2."'");
$r2=mysql_fetch_array($login2);
//echo "SELECT count(absensiid) as total FROM sky_absensi where status='Masuk' and staffid='".$r[staffid]."' and tglabsensi between '".$waktu2a."' and '".$waktu."'";
$login6=mysql_query("SELECT * FROM sky_absensi where status='Masuk' and staffid='".$r[staffid]."' and tglabsensi between '".$waktu2a."' and '".$waktu."'");
$r6=mysql_fetch_array($login6);
//echo "SELECT * FROM sky_absensi where status='Masuk' and staffid='".$r[staffid]."' and tglabsensi between '".$waktu2a."' and '".$waktu."'"; 
$login7=mysql_query("SELECT * FROM sky_absensi where status='Pulang' and staffid='".$r[staffid]."' and tglabsensi between '".$waktu2a."' and '".$waktu."'");
$r7=mysql_fetch_array($login7);

$login3=mysql_query("SELECT count(absensiid) as total FROM sky_absensi where status='Alpa' and staffid='".$r[staffid]."' and tglabsensi between '".$periode1."' and '".$periode2."'");
$r3=mysql_fetch_array($login3);

$login4=mysql_query("SELECT count(absensiid) as total FROM sky_absensi where status='Cuti' and staffid='".$r[staffid]."' and tglabsensi between '".$periode1."' and '".$periode2."'");
$r4=mysql_fetch_array($login4);

$login5=mysql_query("SELECT count(absensiid) as total FROM sky_absensi where status='Off' and staffid='".$r[staffid]."' and tglabsensi between '".$periode1."' and '".$periode2."'");
$r5=mysql_fetch_array($login5);

                       $html.="
          <li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>".$r['staffname']."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>
              <p>   <a rel='gallery-3' href='http://103.253.115.73/cameraalex/saved_images/".$r6['foto']."' title='".$r6['staffname']."' class='swipebox'><img src='http://103.253.115.73/cameraalex/saved_images/".$r6['foto']."' width='245px' height='245px' alt='image'></a></p>
              <p>NIK      :    ".$r['staffno']."</p>
              <p>Fullname :    ".$r['staffname']."</p>
              <p>Tanggal  :    ".$waktuawal."</p>
              <p>Jam Masuk:    ".$r6['jammasuk']."</p>
              <p>Jam Pulang:    ".$r7['jammasuk']."</p>
              ----------------------------------------<br>
              <p>Masuk    :    ".$r2['total']."</p>
              <p>Alpha    :    ".$r3['total']."</p>
              <p>Off      :    ".$r5['total']."</p>
              <p>Sakit    :    ".$r4['total']."</p>
            </div>
            </div>
          </li>";
}

          $html.="</ul>
    </div>
      </div>
      </div>
    </div>



      </div>

    </div>
  </div>
</div>";
echo $html;
?>
