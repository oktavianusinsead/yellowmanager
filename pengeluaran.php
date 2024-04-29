<?php
include "config.php";
session_start();
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Pengeluaran List</div>
    <div class='right'>";
     $login=mysql_query("SELECT count(messageid) as total FROM sky_messageadmin   WHERE approve not in ('x') order by messagedate DESC");

$r=mysql_fetch_array($login);

$total=$r['total'];

      $html.="<a href='notifikasi.php'><span class='badge bg-red'>".$total."</span></a>
    </div>
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
	<div class='content-block-title'>Menu Pengeluaran</div>
		<div class='card'>
		  <div class='card-content'>
			<div class='card-content-inner'>
          <div class='list-block media-list'>
			  <ul>
				<li>
					<a href='pettycash.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-pettycash'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Request by Manager</div>
							</div>
							<div class='item-text'>Menu untuk mencatat dan mengrequest pengeluaran yang pergantian barang atau asset</div>
						</div>
					</a>
				</li>
				<li>
					<a href='pembayaran.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-pengeluaran'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Pengeluaran By HO</div>
							</div>
							<div class='item-text'>Menu untuk mencatat biaya listrik, air dll</div>
						</div>
					</a>
				</li>
				<li>
					<a href='staffdetailsalary.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-salary'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>Salary</div>
							</div>
							<div class='item-text'>Menu untuk mencatat penggajian karyawan</div>
						</div>
					</a>
				</li>
				<li>
					<a href='reportpembayaran.php' class='item-link item-content'>
						<div class='item-media'>
							<i class='icon icon-blog'></i>
						</div>
						<div class='item-inner'>
							<div class='item-title-row'>
								<div class='item-title'>REPORT Pengeluaran</div>
							</div>
							<div class='item-text'>Menu untuk melihat laporan Pengeluaran</div>
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