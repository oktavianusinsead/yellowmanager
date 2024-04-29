<?php
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
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
	<div class='content-block-title'>Sales list</div>
		<div class='card'>
		  <div class='card-content'>
			<div class='card-content-inner'>
          <div class='list-block media-list'>
			  <ul>
				<li>
					<a href='dailyincome.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-income'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>DAILY INCOME</div>
							</div>
							<div class='item-text'>Menu untuk melakukan pengecekkan income harian di lokasi</div>
						</div>
					</a>
				</li>
				<li>
					<a href='targetsales.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-target'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>TARGET SALES</div>
							</div>
							<div class='item-text'>Menu ini untuk melihat Target Sales dan History Sales</div>
						</div>
					</a>
				</li>

				<li>
					<a href='reportsales.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-blog'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>REPORT SALES</div>
							</div>
							<div class='item-text'>Menu untuk melihat laporan penjualan</div>
						</div>
					</a>
				</li>
				
				


			  </ul>
			</div>
			</div>
			</div>
			</div>
    </div>
  </div>
</div>";
echo $html;
?>