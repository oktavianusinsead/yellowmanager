<?php
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='indexkasir.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Waiting List</div>
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
	<div class='content-block-title'>Menu Waiting List</div>

		<div class='card'>
		  <div class='card-content'>
			<div class='card-content-inner'>
          <div class='list-block media-list'>
			  <ul>
				<li>
					<a href='finishorder.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-pettycash'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Finish Order</div>
							</div>
							<div class='item-text'>Menu untuk mencatat pengeluaran yang menggunakan Petty Cash</div>
						</div>
					</a>
				</li>
				<li>
					<a href='cancelorder.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-pengeluaran'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Cancel Order</div>
							</div>
							<div class='item-text'>Menu untuk mencatat biaya listrik, air dll</div>
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