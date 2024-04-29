<?php
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Stock List</div>
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
	<div class='content-block-title'>Menu Stock</div>
		<div class='card'>
		  <div class='card-content'>
			<div class='card-content-inner'>
          <div class='list-block media-list'>
			  <ul>
				<li>
					<a href='stockcategory.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-stock'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Stock List</div>
							</div>
							<div class='item-text'>Menu Untuk melihat stock barang di Lokasi</div>
						</div>
					</a>
				</li>
				<li>
					<a href='requeststock.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-request'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Request Stock</div>
							</div>
							<div class='item-text'>Menu untuk melakukan permintaan barang ke HO</div>
						</div>
					</a>
				</li>
				<li>
					<a href='stockmovement.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-movement'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Stock Movement</div>
							</div>
							<div class='item-text'>Menu untuk melihat pergerakkan Stock dan Asset</div>
						</div>
					</a>
				</li>
				<li>
					<a href='stocktransfer.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-transfer'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Stock Transfer</div>
							</div>
							<div class='item-text'>Menu Untuk melakukan transfer Stock ke HO maupun Cabang Lain</div>
						</div>
					</a>
				</li>
				<li>
					<a href='reportstock.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-transfer'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Report Stock</div>
							</div>
							<div class='item-text'>Menu Untuk melakukan transfer Stock ke HO maupun Cabang Lain</div>
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