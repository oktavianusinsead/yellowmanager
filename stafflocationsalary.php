<?php
include "config.php";

date_default_timezone_set('Asia/Jakarta');
                        $waktu= date("d-m-y H:i");
$notransaksi=date("ymdHis");

$html.="
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
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
  <div data-page='features' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content features'>
  <div class='content-block-title'>Staff Absensi list</div>
    <div class='card'>
      <div class='card-content'>
      <div class='card-content-inner'>
          <div class='list-block media-list'>
        <ul>";
       
        $login=mysql_query("SELECT * FROM sky_position
                                          order by position DESC");

while($r=mysql_fetch_array($login))

{
        $html.="<li>
          <a href='staffinfosalary.php?locationid=".$_GET['locationid']."&positionid=".$r['positionid']."' class='item-link item-content'>
            <div class='item-media'>
              <i class='icon icon-toggle'></i>
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
