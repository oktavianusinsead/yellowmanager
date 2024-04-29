<?php
include "config.php";

date_default_timezone_set('Asia/Jakarta');
                        $waktu= date("d-m-y H:i");
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
    <div class='center sliding'>Staff Salary List</div>
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
  <div class='content-block-title'>Staff Salary List</div>
      <div class='content-block'>


               
                <div class='card-header'>Klik untuk detail gaji karyawan</div>
      <div class='card-content'>
      <div class='card-content-inner'>
        

                                <div class='list-block accordion-list'>
          <ul>

                                  ";

                                          $login=mysql_query("SELECT * FROM sky_staff 
                                         WHERE s.locationid='19' and s.positionid='".$_GET['positionid']."'  order by s.fullname DESC");

while($r=mysql_fetch_array($login))

{
                       $html.="
          <li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>".$r['fullname']."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>";

        


              $html.="<p>   <a rel='gallery-3' href='http://www.erpoasis.com/yellow/img/staff/".$r['picfile']."' title='".$r['fullname']."' class='swipebox'><img src='http://www.erpoasis.com/yellow/img/staff/".$r['picfile']."' width='245px' height='245px' alt='image'></a></p>
              <p>NIK        :    ".$r['recruitmentno']."</p>
              <p>Fullname   :    ".$r['fullname']."</p>
              <p>Position   :    ".$r['position']."</p>
              <p>Gaji Pokok :    ".rupiah($r['salary'])."</p>
              <p>Uang Makan :    ".rupiah($r['uangmakan'])."</p>
              <p>Transport  :    ".rupiah($r['transport'])."</p>
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
