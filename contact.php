<?php
include "config.php";
session_start();
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
  <div data-page='contact' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content contact'>
	<div class='content-block-title'>Contact Detail</div>
      <div class='content-block'>
		<form>
        <div class='list-block inset card'>
                    <ul>";
                             $login=mysql_query("SELECT m.*,l.locationname,p.position FROM sky_loginmanager m
                             left outer join sky_location l on l.locationid=m.locationid
                             left outer join sky_position p on p.positionid=m.positionid
                                         order by m.loginid");

$r=mysql_fetch_array($login);
				$html.="<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' placeholder='Name' value='".$r['fullname']."'>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='email' placeholder='Username' value='".$r['username']."'>
					  </div>
					</div>
				  </div>
				</li>

				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' placeholder='Location' value='".$r['locationname']."'>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' placeholder='Position' value='".$r['position']."'>
					  </div>
					</div>
				  </div>
				</li>
			</ul>
		  </div>
			<input type='submit' class='button button-fill color-blue' value='Edit'>
		  </form>
		  <div class='card location'>
			  <div class='card-header'>Our location</div>
			  <div class='card-content'>
				<div class='card-content-inner'>
				<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.25338463818!2d106.6484204!3d-6.2223495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x657a10d5e4b38f98!2sYellow+Cars+Wash!5e0!3m2!1sen!2sid!4v1471795176228' width='100%' height='150' frameborder='0' style='border:0' allowfullscreen></iframe>
					</div>
			  </div>
			  <div class='card-footer'>
				Location: ".$r['locationname']."</br>
				Email: yellow@gmail.com</br>
				Mobile: +000 257 210 31
			  </div>
			</div>
      </div>
	  
    </div>
  </div>
</div>";
echo $html;
?>