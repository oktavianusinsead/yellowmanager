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
    <div class='left'><a href='indexkasir.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Complete Order</div>
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
	<div class='content-block-title'>Waiting List</div>
      <div class='content-block'>


               
                <div class='card-header'>Check Platno Jika sudah Selesai</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<form method='POST' action='proseswaitinglist.php'>\n

                                <div class='list-block accordion-list'>
				  <ul>

                                  ";

                                        $login=mysql_query("SELECT distinct(tiketno),nopolisi FROM sky_transaction

                                         WHERE timeout='' and waitinglist not in ('x') order by datetransact DESC limit 0,10");

while($r=mysql_fetch_array($login))

{
				               $html.="
					<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>".$r['nopolisi']."</div>
						 <input type='checkbox' name='transactionno[]' value='".$r['tiketno']."'/> 
                                                </div></a>

					</li>";
}

				  $html.="<input type='submit' class='button button-fill color-blue' value='Send'>
   <button onclick='myFunction()'>Print</button>
    </form></ul>
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
