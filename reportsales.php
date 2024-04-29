<?php

$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Report Sales List</div>
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
	<div class='content-block-title'>Report Sales</div>
      <div class='content-block'>
        <div class='card'>
		<div class='card-header'>Report</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<div class='list-block accordion-list'>
				  <ul>
					<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>Daily Report</div>
						</div></a>
						<form method='POST' action='reportincomedaily.php'>
					  <div class='accordion-item-content'>
						<div class='content-block'>
						<p> "; 
						
						$tanggal=1;
						$html .="<select name='tgl'><option value='-'>Tgl</option>";
						while($tanggal<=31){
							if($tanggal<>$date){
								$html .= "<option value=".$tanggal.">".$tanggal."</option>";}
							else {
								$html .= "<option value=".$tanggal." selected>".$tanggal."</option>";}	
							$tanggal++;
						}
						$html .= "</select>";
						$bul=1;	$bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
						$html .="<select name='bln'><option value='-'>Bln</option>";
						while($bul<=12){
							if($bul<>$month){
								$html .="<option value=".$bul.">".$bulan[$bul-1]."</option>";}
							else {
								$html .="<option value=".$bul." selected>".$bulan[$bul-1]."</option>";}
							$bul++;
						}
						$html .="</select>";
						$th=2016;
						$html .= "<select name='thn'><option value='-'>Thn</option>";
						while($th<=2020){
							if($th<>$year){
								$html .= "<option value=".$th.">".$th."</option>";}
							else {
								$html .= "<option value=".$th." selected>".$th."</option>";}
							$th++;
						}
						$html .="</select></p>
						<input type='submit' class='button button-fill color-blue' value='Send'>
						</div>
						</form>
					  </div>
					</li>
					<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>Monthly Report</div>
						</div></a>
						<form method=POST action='reportincomemonthly.php'>
					  <div class='accordion-item-content'>
						<div class='content-block'>
						 <p>";$bul=1;	$bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
						$html .="<select name='bln'><option value='-'>Bln</option>";
						while($bul<=12){
							if($bul<>$month){
								$html .="<option value=".$bul.">".$bulan[$bul-1]."</option>";}
							else {
								$html .="<option value=".$bul." selected>".$bulan[$bul-1]."</option>";}
							$bul++;
						}
						$html .="</select>";
						$th=2016;
						$html .= "<select name='thn'><option value='-'>Thn</option>";
						while($th<=2020){
							if($th<>$year){
								$html .= "<option value=".$th.">".$th."</option>";}
							else {
								$html .= "<option value=".$th." selected>".$th."</option>";}
							$th++;
						}
						$html .="</select></p>   
						<input type='submit' class='button button-fill color-blue' value='Send'>
						</div>
						</form>
					  </div>
					</li>
					
				  </ul>
				  
				</div>
			</div>
		  </div>
		</div>
		
		
		
      </div>
	  
    </div>
  </div>
</div> ";
echo $html;
?>