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
    <div class='center sliding'>Logout Apps</div>
    <div class='right'>
      <!-- Right link contains only icon - additional 'icon-only' class--><a href='#' class='link icon-only open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>  
  <!-- Page, data-page contains page name-->
  <div data-page='toggle' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content about'>
	<div class='content-block-title'>Logout Apps</div>
      <div class='content-block'>


               
                <div class='card-header'>Apakah Anda Yakin Mau Keluar Dari Apps</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<form method='POST' action='logout.php'>\n

                                <div class='list-block accordion-list'>


				  <input type='submit' class='button button-fill color-blue' value='Logout'>

    </form>
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
