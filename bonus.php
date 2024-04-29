<?php
include "config.php";
session_start();
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Bonus List</div>
    <div class='right'>
      <a href='#' data-panel='right' class='item-link item-content open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>
  <!-- Page, data-page contains page name-->
  <div data-page='tabs' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content about'>
	<div class='content-block-title'>Bonus List per Location - ".$_SESSION['position']."</div>
      <div class='content-block'>";
      
      if($_SESSION['position']=="Manager Outlet")
      {
      $html.="<div class='card'>
		<div class='card-header'>Alam Sutera</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<!-- Buttons row as tabs controller -->
				<div class='buttons-row'>
				  <!-- Link to 1st tab, active -->
				  <a href='#tab1' class='tab-link active button'>Bonus Manager</a>
				  <!-- Link to 2nd tab -->
				  <a href='#tab2' class='tab-link button'>Bonus Leader</a>
				</div>
				<!-- Tabs, tabs wrapper -->
				  <div class='tabs'>
					<!-- Tab 1, active by default -->
					<div id='tab1' class='tab active'>
					  <div class='content-block'>
						<p>Phasellus iaculis porttitor magna, id malesuada lectus auctor ac. Maecenas fermentum venenatis pellentesque. Sed id ante eu lorem faucibus tristique. Vestibulum vitae tincidunt diam. Aliquam erat volutpat. Sed est quam, pharetra sit amet pretium in, tristique non enim.</p>
					  </div>
					</div>
					<!-- Tab 2 -->
					<div id='tab2' class='tab'>
					  <div class='content-block'>
						<p>Suspendisse ultrices auctor consequat. Curabitur molestie diam eu tortor sollicitudin accumsan. Suspendisse finibus blandit leo, et volutpat ligula tempor quis. Vivamus vel velit et urna maximus porttitor ac eu diam. Morbi faucibus tincidunt tortor. Sed tempus purus vitae rutrum auctor. </p>
					  </div>
					</div>
					<!-- Tab 3 -->
					</div>
				<!---->
			</div>
		  </div>
		</div>";
      }
      else
      {
        
         $login=mysql_query("Select * from sky_location");

while($r=mysql_fetch_array($login))

{
        $html.="<div class='card'>
		<div class='card-header'>".$r['locationname']."</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<!-- Buttons row as tabs controller -->
				<div class='buttons-row'>
				  <!-- Link to 1st tab, active -->
				  <a href='#tab4' class='tab-link active button'>Bonus Manager</a>
				  <!-- Link to 2nd tab -->
				  <a href='#tab5' class='tab-link button'>Bonus Leader</a>
				</div>
				<!-- Tabs, tabs wrapper -->
				 <div class='tabs-animated-wrap'>
				  <div class='tabs'>
					<!-- Tab 1, active by default -->
					<div id='tab4' class='tab active'>
					  <div class='content-block'>
						<p>Phasellus iaculis porttitor magna, id malesuada lectus auctor ac. Maecenas fermentum venenatis pellentesque. Sed id ante eu lorem faucibus tristique. Vestibulum vitae tincidunt diam. Aliquam erat volutpat. Sed est quam, pharetra sit amet pretium in, tristique non enim.</p>
					  </div>
					</div>
					<!-- Tab 2 -->
					<div id='tab5' class='tab'>
					  <div class='content-block'>
						<p>Suspendisse ultrices auctor consequat. Curabitur molestie diam eu tortor sollicitudin accumsan. Suspendisse finibus blandit leo, et volutpat ligula tempor quis. Vivamus vel velit et urna maximus porttitor ac eu diam. Morbi faucibus tincidunt tortor. Sed tempus purus vitae rutrum auctor. </p>
					  </div>
					</div>
					</div>
					</div>
				<!---->
			</div>
		  </div>
		</div>";
            }
      }

		

      $html.="</div>
	  
    </div>
  </div>
</div>";
echo $html;
?>