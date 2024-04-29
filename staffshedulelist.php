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
$waktu= date("y-m-d");
                                          $login=mysql_query("SELECT *  FROM sky_staff
                                         WHERE locationid='".$_GET[locationid]."' and inactive not in ('x') and positionid='".$_GET[positionid]."' and staffid not in (select staffid from sky_staffschedule)  order by staffname ASC");

while($r=mysql_fetch_array($login))

{
                      

                       $html.="
          <li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>".$r['staffname']."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>
            <form method='POST' action='prosesscheduleadd.php'>
              <p>
              <input type='hidden' name='staffid' value='".$r[staffid]."'/>
              ";
               $html .= "<select name='sts'><option value='-'>Status</option>";
            
                $html .= "<option value='M01'>M01</option>";
                 $html .= "<option value='M02'>M02</option>";
              $html .= "<option value='M03'>M03</option>";
              $html .= "<option value='M04'>M04</option>";
              $html .= "<option value='M05'>M05</option>";
              $html .= "<option value='M06'>M06</option>";
              $html .= "<option value='M07'>M07</option>";
              
              
               $html .= "<option value='N01'>N01</option>";
                 $html .= "<option value='N02'>N02</option>";
              $html .= "<option value='N03'>N03</option>";
              $html .= "<option value='N04'>N04</option>";
              $html .= "<option value='N05'>N05</option>";
              $html .= "<option value='N06'>N06</option>";
              $html .= "<option value='N07'>N07</option>";

            $html .="</select></p>
            <input type='submit' class='button button-fill color-blue' value='Send'>
            </form>
            </div>
            </div>
          </li>";
}

          $html.="</ul>
    </div>
    <br><br>
    <div class='list-block accordion-list'>
          <ul>";
          
           $login2=mysql_query("SELECT count(scheduleid) as totalm FROM sky_staffschedule
                                         WHERE rosterno in ('M01','M02','M03','M04','M05','M06','M07')");

$r2=mysql_fetch_array($login2);


$login3=mysql_query("SELECT count(scheduleid) as totalN FROM sky_staffschedule
                                         WHERE rosterno in ('N01','N02','N03','N04','N05','N06','N07')");

$r3=mysql_fetch_array($login3);


if($_GET[positionid]=='16')
{
               $html.="
          <li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>Total M : ".$r2[totalm]."</div>
            </div>
            <div class='item-inner'>
              <div class='item-title'>Total N : ".$r3[totalN]."</div>
            </div>
            </div>
          </li>
          </ul>";
 }
      $html.="</div>
      </div>
    </div>



      </div>

    </div>
  </div>
</div>";
echo $html;
?>
