
<?php
include "config.php";
session_start();
$html.="
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Complement Barcode</div>
    <div class='right'>
      <!-- Right link contains only icon - additional 'icon-only' class--><a href='#' class='link icon-only open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>
  <!-- Page, data-page contains page name-->
  <div data-page='single' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content'>
		<div id='blog-page'>";
		 $login=mysql_query("SELECT m.*,l.locationname,p.position FROM sky_loginmanager m
                             left outer join sky_location l on l.locationid=m.locationid
                             left outer join sky_position p on p.positionid=m.positionid
                                         order by m.loginid");

$r=mysql_fetch_array($login);
			$html.="<div class='card post-card'>
			  <div class='card-header'>
				<div class='post-avatar'><img src='images/photos/avatar.jpg' width='34' height='34' alt='avatar'></div>
				<div class='post-name'>".$r['fullname']."</div>
				<div class='post-date'>".$r['position']."</div>
			  </div>
			  <div class='card-content'>
				<div class='card-content-inner'>
				  <h4 class='title-post'><a href='#'></a></h4>";
				  if($r['barcode']!='0')
				  {

$html.="<img src='http://qrfree.kaywa.com/?s=8&d=".$r['barcode']."' alt='QRCode'/><p>".$r['position']."</p>";
      }
			  $html.="</div>


		</div>
	  
    </div>
  </div>
</div>";

echo $html;
?>