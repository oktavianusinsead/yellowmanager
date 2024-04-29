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
	<div class='card-header'>Transaksi</div>
		  <div class='card-content'>


        <div class='list-block inset card'>
			<ul>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='transactionno' placeholder='Transaction No' value='".$notransaksi."'>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='tgl' placeholder='Tanggal' value='".$waktu."'>
					  </div>
					</div>
				  </div>
				</li>


			</ul>
		  </div>



      </div>

    </div>
               
                <div class='card-header'>Transaksi</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<form method='POST' action='proses.php'>\n

                                <div class='list-block accordion-list'>
				  <ul>
                                  <li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='platno' placeholder='Plat No'>
					  </div>
					</div>
				  </div>
				</li>
                                  ";
				        $login2=mysql_query("SELECT count(itemid) as total FROM sky_item WHERE itemtypeid='1' and sales='x'");
                                        $r2=mysql_fetch_array($login2);
                                        $login=mysql_query("SELECT i.*,p.price FROM sky_item i
                                        left outer join sky_itemprice p on p.itemid = i.itemid
                                         WHERE i.itemtypeid='1' and i.sales='x' and locationid='19'");

while($r=mysql_fetch_array($login))

{
				               $html.="
					<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>".$r['itemname']."</div>
						</div></a>
					  <div class='accordion-item-content'>
						<div class='content-block'>
						  <p>Order : 		<input type='hidden' name='transactionno'  value='".$notransaksi."'>
				 <input type='hidden' name='item' value='".$r['itemid']."'/> <input type='checkbox' name='check_list[]' value='".$r['itemid']."'/>
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
