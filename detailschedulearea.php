<?php
session_start();
include "config.php";

date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("d-m-y H:i");
$notransaksi=date("ymdHis");

$html.="
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Staff List</div>
    <div class='right'>
      <a href='#' data-panel='right' class='item-link item-content open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>
  <!-- Page, data-page contains page name-->
  <div data-page='features' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content features'>
  <div class='content-block-title'>Staff list</div>
    <div class='card'>
      <div class='card-content'>
      <div class='card-content-inner'>
          <div class='list-block media-list'>
        <ul>";
        if($_SESSION['position']=="Manager Outlet")
      {
        $login=mysql_query("SELECT * FROM sky_position where positionid in ('11','12','13','14')
                                          order by position DESC");

while($r=mysql_fetch_array($login))

{
        $html.="<li>
          <a href='staffshedulelist.php?locationid=".$_SESSION['locationid']."&positionid=".$r['positionid']."' class='item-link item-content'>
            <div class='item-media'>
              <i class='icon icon-stock'></i>
            </div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>".$r['position']."</div>
              </div>
              <div class='item-text'>Menu ini untuk melihat Staff berdasarkan posisi ".$r['position']."</div>
            </div>
          </a>
        </li>";
}
}
else
          {
             $login=mysql_query("SELECT * FROM sky_location
                                         order by locationname");

while($r=mysql_fetch_array($login))

{
            $html.="<li>
          <a href='scheduleposition.php?locationid=".$r['locationid']."' class='item-link item-content'>
            <div class='item-media'>
              <i class='icon icon-stock'></i>
            </div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>".$r['locationname']."</div>
              </div>
              <div class='item-text'>Menu ini untuk melihat Staff di lokasi ".$r['locationname']."</div>
            </div>
          </a>
        </li>";
 }
      }

        
        $html.="</ul>
      </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>";
echo $html;
?>
