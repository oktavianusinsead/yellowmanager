<?php
include "config.php";
session_start();
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
  <div data-page='toggle' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content about'>
	<div class='content-block-title'>Stock Sales</div>
      <div class='content-block'>
        <div class='card'>
		<div class='card-header'>Stock Report</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<div class='list-block accordion-list'>
				  <ul>";
				   $login=mysql_query("SELECT * FROM sky_item

                                         WHERE itemtypeid='".$_GET[itemtypeid]."'");

while($r=mysql_fetch_array($login))

{
					$html.="<li class='accordion-item'><a href='#' class='item-content item-link'>
						<div class='item-inner'>
						  <div class='item-title'>".$r['itemname']."</div>
						</div></a>
					  <div class='accordion-item-content'>
						<div class='content-block'>";
						$login2=mysql_query("SELECT sum(qty) as totalplus FROM sky_itemstock 

                                         WHERE  locationid='".$_SESSION['locationid']."' and itemid='".$r['itemid']."' and statusmove='+'");

						$r2=mysql_fetch_array($login2);

						$login3=mysql_query("SELECT sum(qty) as totalminus FROM sky_itemstock 

                                         WHERE  locationid='".$_SESSION['locationid']."' and itemid='".$r['itemid']."' and statusmove='-'");

						$r3=mysql_fetch_array($login3);

						$stock=$r2['totalplus'] + $r3['totalminus'];
						$html.="<p>".$stock."</p>  
						</div>
					  </div>
					</li>";
				}
					
				  $html.="</ul>
				  <input type='submit' class='button button-fill color-blue' value='Send'>
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