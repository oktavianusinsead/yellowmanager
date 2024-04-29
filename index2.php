<?php
//ob_start();
// //
$html="
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui'>
    <meta name='apple-mobile-web-app-capable' content='yes'>
    <meta name='apple-mobile-web-app-status-bar-style' content='black'>
	<link rel='apple-touch-icon' href='images/apple-touch-icon.png' />
	<link rel='apple-touch-startup-image' href='images/YellowApps.png' />
    <title>Yellow Apps</title>
    <!-- Path to Framework7 Library CSS-->
    <link rel='stylesheet' href='css/framework7.min.css'>
    <link rel='stylesheet' href='css/swipebox.css'>
    <!-- Path to your custom app styles-->
    <link rel='stylesheet' href='style.css'>
    
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<style>
#mapdiv {
	margin: 0;
	padding: 0;
	width: 500px;
	height: 500px;
}
</style>

<script>
       function printIframe(objFrame) {
           objFrame.focus();
           objFrame.print();
           bjFrame.save();
       }
   </script>

   <script src='http://code.jquery.com/jquery-1.9.0rc1.js'></script>

        <script> 
        jQuery(window).ready(function(){ 
            $('#btnInit').click(function()
            {
                alert('click button');
                initiate_geolocation();
            }); 
        }); 
        function initiate_geolocation() { 
            alert('function initiate_geolocation');
            navigator.geolocation.getCurrentPosition(handle_geolocation_query,handle_errors); 
        } 
        function handle_errors(error) 
        { 
            alert('function handle_errors');
            switch(error.code) 
            { 
                case error.PERMISSION_DENIED: alert('user did not share geolocation data'); 
                break; 
                case error.POSITION_UNAVAILABLE: alert('could not detect current position'); 
                break; 
                case error.TIMEOUT: alert('retrieving position timed out'); 
                break; 
                default: alert('unknown error');
                break; 
            } 
        } 
        function handle_geolocation_query(position){

            alert('function handle_geolocation_query');
            alert('Lat: ' + position.coords.latitude + 
                  ' Lon: ' + position.coords.longitude); 
        } 
    </script>
  </head>
  <body id='mobile_wrap'>

    <!-- Status bar overlay for fullscreen mode-->
    <div class='statusbar-overlay'></div>
    <!-- Panels overlay-->
    <div class='panel-overlay'></div>
    <!-- Left panel with reveal effect-->
    <div class='panel panel-left panel-cover'>
      <div class='content-block'>
        <ul class='panel-content'>
			<li class='panel-link'><a href='sales.php' class='close-panel'><img src='images/icons/white/Table 1.ico' alt='about'>Sales</a></li>
			<li class='panel-link'><a href='pengeluaran.php' class='close-panel'><img src='images/icons/white/Write.ico' alt='about'>Pengeluaran</a></li>
			<li class='panel-link'><a href='stock.php' class='close-panel'><img src='images/icons/white/Properties.ico' alt='about'>Stock</a></li>
			<li class='panel-link'><a href='staff.php' class='close-panel'><img src='images/icons/white/Add Card.ico' alt='about'>Staff</a></li>
			<li class='panel-link'><a href='message.php' class='close-panel'><img src='images/icons/white/Chat 2.ico' alt='about'>Message</a></li>
		   <li class='panel-link'> <a href='compliment.php' class='close-panel'><img src='images/icons/white/Contacts.ico' alt='about'>Compliment</a></li>
			   <li class='panel-link'> <a href='logoutpage.php' class='close-panel'><img src='images/icons/black/login.png' alt='about'>Logout</a></li>

		</ul>
      </div>
    </div>";
	

    $html.="<!-- Right panel with cover effect-->
    <div class='panel panel-right panel-cover'>
      <div class='content-block'>
		<div class='panel-cover'>
			<div class='cover'></div>
			<div class='cover-text'>Hi, Admin
			<span>Manager</span>
                        <span>YELLOW</span></div>
		</div>
        <ul class='panel-content'>
			<li class='panel-link'>
				<a href='contact.php' class='close-panel'>Profile
				</a>
			</li>
			<li class='panel-link'>
				<a href='single.php' class='close-panel'>Barcode
				</a>
			</li>
			<li class='panel-link'><a href='account.php' class='close-panel'>Account  </a></li>
			<li class='panel-link'><a href='notifikasi.php' class='close-panel'>Messages <span class='badge bg-red'>".$total."</span></a></li>
			<li class='panel-link'><a href='location.html' class='close-panel'>Check In</a></li>
			<li class='panel-link'><a href='compliment.php' class='close-panel'>Compliment</a></li>
		   <li class='panel-link'> <a href='logoutpage.php' class='close-panel'>Logout</a></li>
		</ul>
      </div>
    </div>
    <!-- Views-->
    <div class='views'>
      <!-- Your main view, should have 'view-main' class-->
      <div class='view view-main'>
        <!-- Top Navbar-->
        <div class='navbar navbar-hidden'>
          <div class='navbar-inner'>
          </div>
        </div>
        <!-- Pages, because we need fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class='pages navbar-through toolbar-through'>
          <!-- Page, data-page contains page name-->
          <div data-page='index' class='page no-navbar' id='home'>
            <!-- Scrollable page content-->
            <div class='page-content'>
				<div id='cover'></div>
				<div class='content'>
         ";
			                 
				               $html.="
                                               <div class='card post-card'>
			                  <div class='card-header'>
                                               <div class='post-pesan'>Selamat Datang</div>
                                               </div>

                                                </div>
                                               ";

			                   $html.="


			      </div>
			      <br><br><br> <br><br><br><br><br><br><br>";



			      $html.="<div class='card location'>
			  <div class='card-header'>Our Location - Yellow</div>
			  <div class='card-content'>
				<div class='card-content-inner'>
				<p>Income Yellow : Rp. 0</p>
				</div>
				<div class='card-content-inner'>
				<p>Income Cube Mart: Rp. 0</p>
				</div>
			  </div>

			</div>
                                </div>

              </div>
            </div>
          <!--Ini Kalau di hapus bottom toolbar hilang</div>-->

		  <!-- Bottom Toolbar-->
       <div class='toolbar tabbar'>
			<div class='toolbar-inner'>

				<a href='penjualan.php' class='link'>
					<img src='images/icons/white/Table 1.ico' alt='Penjualan'><p>Sales</p>
				</a>
                                <a href='pengeluaran.php' class='link'>
					<img src='images/icons/white/Write.ico' alt='login'><p>Cost</p>
				</a>
				<a href='stock.php' class='link'>
					<img src='images/icons/white/Properties.ico' alt='gallery'><p>Stock</p>
				</a>
				<a href='staff.php' class='link'>
					<img src='images/icons/white/Add Card.ico' alt='gallery'><p>Staff</p>
				</a>
				<a href='message.php' class='link'>
					<img src='images/icons/white/Chat 2.ico' alt='blog'><p>Request</p>
				</a>
			</div>
		</div>

        </div>
      </div>
	  <!-- Login Screen -->
	  <div class='login-screen'>
		  <!-- Default view-page layout -->
		  <div class='view'>
			<div class='page'>
			  <!-- page-content has additional login-screen content -->
			  <div class='page-content login-screen-content'>
				<!--<div class='login-screen-title'><img src='images/logo-black.png' alt='Bernardo'></div> -->
				 Login form 
				<form>
				  <div class='list-block'>
					<ul>
					  <li class='item-content'>
						<div class='item-inner'>
						  <div class='item-title label'>Username</div>
						  <div class='item-input'>
							<input type='text' name='username' placeholder='Username'>
						  </div>
						</div>
					  </li>
					  <li class='item-content'>
						<div class='item-inner'>
						  <div class='item-title label'>
							Password
							<p class='forget-password'><a href='#' data-popup='.popup-forgot-password' class='open-popup'>Forgot Password?</a></p>
						</div>
						  <div class='item-input'>
							<input type='password' name='password' placeholder='Password'>
						  </div>
						</div>
					  </li>
					</ul>
				  </div>
				  <div class='list-block'>
					<ul>
					  <li>
						<div class='content-block'>
						<a href='#' class='item-link button button-fill color-blue'>Sign In</a>
						</div>
					  </li>
					</ul>
					<div class='list-block-label'>
						Don't have an account?
						<p><a href='#' data-popup='.popup-register' class='open-popup'>Sign up</a></p>
						<br/>
						<a href='#' class='close-login-screen button button-fill color-red'>Close</a>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
	  </div>
	  
	  <!-- Register Popup -->
	  <div class='popup popup-register'>
		  <div class='page-content login-screen-content'>
				<div class='login-screen-title'><img src='images/logo-black.png' alt='Bernardo'></div>
				<!-- Login form -->
				<form>
				  <div class='list-block'>
					<ul>
					  <li class='item-content'>
						<div class='item-inner'>
						  <div class='item-title label'>Username</div>
						  <div class='item-input'>
							<input type='text' name='username' placeholder='Username'>
						  </div>
						</div>
					  </li>
					  <li class='item-content'>
						<div class='item-inner'>
						  <div class='item-title label'>Email</div>
						  <div class='item-input'>
							<input type='email' name='email' placeholder='Email'>
						  </div>
						</div>
					  </li>
					  <li class='item-content'>
						<div class='item-inner'>
						  <div class='item-title label'>
							Password
						</div>
						  <div class='item-input'>
							<input type='password' name='password' placeholder='Password'>
						  </div>
						</div>
					  </li>
					</ul>
				  </div>
				  <div class='list-block'>
					<ul>
					  <li>
						<div class='content-block'>
						<a href='#' class='item-link  button button-fill color-blue'>Register now</a>
						<br/>
						<a href='#' class='button button-fill color-red close-popup'>Close</a>
						</div>
					  </li>
					</ul>
				  </div>
				</form>
			  </div>
	  </div>
	  
	  <!-- Forgot password Popup -->
	  <div class='popup popup-forgot-password'>
		  <div class='page-content login-screen-content'>
				<div class='login-screen-title'><img src='images/logo-black.png' alt='Bernardo'></div>
				<!-- Login form -->
				<form>
				  <div class='list-block'>
					<ul>
					  <li class='item-content'>
						<div class='item-inner'>
						  <div class='item-title label'>Your Email</div>
						  <div class='item-input'>
							<input type='email' name='email' placeholder='Email'>
						  </div>
						</div>
					  </li>
					</ul>
				  </div>
				  <div class='list-block'>
					<ul>
					  <li>
						<div class='content-block'>
						<a href='#' class='item-link  button button-fill color-blue'>Resend password</a>
						<br/>
						<a href='#' class='button button-fill color-red close-popup'>Close</a>
						</div>
					  </li>
					</ul>
					<div class='list-block-label'>Check your email and follow the instructions to reset your password.</div>
				  </div>
				</form>
			  </div>
	  </div>
	  
    <script type='text/javascript' src='js/jquery-1.10.1.min.js'></script>
	<!-- Path to Framework7 Library JS-->
    <script type='text/javascript' src='js/framework7.min.js'></script>
    <script type='text/javascript' src='js/jquery.swipebox.js'></script>
    <script type='text/javascript' src='js/jquery.fitvids.js'></script>
    <!-- Path to your app js-->
    <script type='text/javascript' src='js/my-app.js'></script>
    <script type='text/javascript'
      src='https://maps.googleapis.com/maps/api/js?sensor=false'>
    </script>
    <script type='text/javascript'>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-8196211-5']);
_gaq.push(['_trackPageview']);
		
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
		
</script>
  </body>

</html>";
echo $html;
//}
?>