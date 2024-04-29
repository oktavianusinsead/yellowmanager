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
					  <div class='accordion-item-content'>
						<div class='content-block'>
						<p>Pick a Date: <input type='text' id='datepicker' /></p>  
						</div>
					  </div>
					</li>
					<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>Monthly Report</div>
						</div></a>
					  <div class='accordion-item-content'>
						<div class='content-block'>
						 <p>Pick a Date: <input type='text' id='datepicker' /></p> 
						</div>
					  </div>
					</li>
					
				  </ul>
				 <input type='submit' value='Print' onclick='printIframe(report);'/>
   
   <iframe name='report' id='report' src='sales.php'></iframe>
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