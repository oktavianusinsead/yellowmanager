<?php
ob_start();
session_start();
include "config.php";
if( isset($_SESSION['username'])=="" ){
 header("Location: index.php");
}
else
{
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
			<li class='panel-link'><a href='sales.php' class='close-panel'><img src='images/icons/white/Table 1.ico' alt='about'>CO</a></li>
			<li class='panel-link'><a href='waitinglist.php' class='close-panel'><img src='images/icons/white/Write.ico' alt='about'>Waiting List</a></li>
			<li class='panel-link'><a href='message.php' class='close-panel'><img src='images/icons/white/Chat 2.ico' alt='about'>Message</a></li>
		   <li class='panel-link'> <a href='#' data-panel='right' class='item-link item-content open-panel'><img src='images/icons/white/Contacts.ico' alt='about'>Profile</a></li>
		 <li class='panel-link'> <a href='logoutpage.php' class='link'>
					<img src='images/icons/black/login.png' alt='blog'><p>Logout</p>
				</a></li>
		</ul>
      </div>
    </div>

    <!-- Right panel with cover effect-->
    <div class='panel panel-right panel-cover'>
      <div class='content-block'>
		<div class='panel-cover'>
			<div class='cover'></div>
			<div class='cover-text'>Hi, ".$_SESSION['username']."
			<span>".$_SESSION['position']."</span>
                        <span>".$_SESSION['location']."</span></div>
		</div>
        <ul class='panel-content'>
			<li class='panel-link'>
				<a href='contact.html' class='close-panel'>Profile
				</a>
			</li>
			<li class='panel-link'>
				<a href='single.html' class='close-panel'>Settings
				</a>
			</li>
			<li class='panel-link'><a href='single.html' class='close-panel'>Account  </a></li>
			<li class='panel-link'><a href='#' class='close-panel'>Messages <span class='badge bg-red'>5</span></a></li>
			<li class='panel-link'><a href='#' class='close-panel'>Favourites</a></li>
		   <li class='panel-link'> <a href='logoutpage.php'>Logout</a></li>
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
			                  date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("H:i");
			                  //echo $waktu;


			                  $login=mysql_query("SELECT * FROM sky_shoutout WHERE categoryid='1' AND shiftid='1' and CURTIME() between timestart and timeend");
while($r=mysql_fetch_array($login))
{
				               $html.="
                                               <div class='card post-card'>
			                  <div class='card-header'>
                                               <div class='post-pesan'>".$r['pesan']."</div>
                                               </div>

                                                </div>
                                               ";
}
			                   $html.="


			      </div>
			      <br><br><br> <br><br><br><br><br><br><br>
			      <div class='card location'>
			  <div class='card-header'>".$_SESSION['username']." - Alam Sutera</div>


			</div>
                                </div>

              </div>
            </div>
          <!--Ini Kalau di hapus bottom toolbar hilang</div>-->

		  <!-- Bottom Toolbar-->
       <div class='toolbar tabbar'>
			<div class='toolbar-inner'>

				<a href='sales.php' class='link'>
					<img src='images/icons/white/Table 1.ico' alt='Penjualan'><p>CO</p>
				</a>
                                <a href='waitinglist.php' class='link'>
					<img src='images/icons/white/Write.ico' alt='login'><p>Waiting List</p>
				</a>

				<a href='message.php' class='link'>
					<img src='images/icons/white/Chat 2.ico' alt='blog'><p>Message</p>
				</a>
				<a href='logoutpage.php' class='link'>
					<img src='images/icons/black/login.png' alt='blog'><p>Logout</p>
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
  </body>

</html>";
echo $html;
}
?>