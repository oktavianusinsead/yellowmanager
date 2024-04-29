<?php
include "config.php";
session_start();
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("d-m-y H:i");
$notransaksi=date("ymdHis");

$html.="
<script>
function myFunction() {
    window.print();
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
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Message List</div>
    <div class='right'>
      <!-- Right link contains only icon - additional 'icon-only' class--><a href='#' class='link icon-only open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>  
  <!-- Page, data-page contains page name-->
  <div data-page='toggle' class='page no-toolbar'>
    <!-- Scrollable page content-->
    <div class='page-content about'>
	<div class='content-block-title'>Message</div>
      <div class='content-block'>
        <div class='card'>
	<div class='card-header'>Message Request </div>
		  <div class='card-content'>


        <div class='list-block inset card'>
		<button id='btnInit' >Find my location</button>	
		  </div>

    

      </div>

    </div>


              



      </div>

    </div>
  </div>
</div>";
echo $html;
?>
