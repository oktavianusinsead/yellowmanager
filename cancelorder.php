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
    <div class='center sliding'>Transaksi</div>
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
	<div class='content-block-title'>Transaksi</div>
      <div class='content-block'>

        <div class='card'>
	
               
                <div class='card-header'>Pembatalan Transaksi</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<form method='POST' action='proses.php'>\n

                                <div class='list-block accordion-list'>
				  <ul>
                                  
                                  ";
				        $login=mysql_query("SELECT t.*,i.itemname FROM sky_transaction t
				        left outer join sky_item i on i.itemid = t.itemid

                                         WHERE timeout='' and waitinglist not in ('x') order by datetransact DESC limit 0,10");

while($r=mysql_fetch_array($login))

{

				               $html.="
					<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>".$r[nopolisi]." - ".$r['tiketno']."</div>
						</div></a>
                                        <div class='accordion-item-content'>
						<div class='content-block'>
						  <p>Cancel : 		<input type='hidden' name='transactionno'  value='".$notransaksi."'>
				         <input type='text' name='item' value='".$r['itemname']."'/> <input type='checkbox' name='check_list[]' value='".$r['itemid']."'/>
</p>
						</div>
					  </div>                                         
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
