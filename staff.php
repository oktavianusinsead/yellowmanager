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
	<div class='content-block-title'>Menu Staff</div>
		<div class='card'>
		  <div class='card-content'>
			<div class='card-content-inner'>
          <div class='list-block media-list'>
			  <ul>
				<li>
					<a href='staffdetail.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-stock'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Daftar Karyawan</div>
							</div>
							<div class='item-text'>Menu Untuk melihat daftar karyawan di lokasi</div>
						</div>
					</a>
				</li>
				<li>
					<a href='absensikaryawan.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-request'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Absensi</div>
							</div>
							<div class='item-text'>Menu untuk melihat dan melakukan absensi</div>
						</div>
					</a>
				</li>

				<li>
					<a href='staffdetailabsen.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-request'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Absensi Karyawan</div>
							</div>
							<div class='item-text'>Menu untuk melihat dan melakukan absensi</div>
						</div>
					</a>
				</li>
				<li>
					<a href='stafflembur.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-request'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Lembur / Overtime</div>
							</div>
							<div class='item-text'>Menu untuk melihat dan melakukan absensi</div>
						</div>
					</a>
				</li>
				<li>
					<a href='detailschedulearea.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-request'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Schedule</div>
							</div>
							<div class='item-text'>Menu untuk melihat dan melakukan Schedule</div>
						</div>
					</a>
				</li>
				<li>
					<a href='bonus.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-movement'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Bonus</div>
							</div>
							<div class='item-text'>Menu untuk melihat pergerakkan Bonus</div>
						</div>
					</a>
				</li>
				<li>
					<a href='sp.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-transfer'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Recruitment</div>
							</div>
							<div class='item-text'>Menu Untuk melakukan rekruitment karyawan</div>
						</div>
					</a>
				</li>
				
				<li>
					<a href='sp.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-transfer'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>SP</div>
							</div>
							<div class='item-text'>Menu Untuk melakukan SP</div>
						</div>
					</a>
				</li>

				<li>
					<a href='cardregister.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-transfer'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Card Register</div>
							</div>
							<div class='item-text'>Menu Untuk melakukan Card Register</div>
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