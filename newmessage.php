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

<form method='POST' action='prosesnewmessage.php' enctype='multipart/form-data'>\n
        <div class='list-block inset card'>
			<ul>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='transactionno' placeholder='Message No' value='".$notransaksi."'>
					  <input type='hidden' name='locationid' placeholder='Transaction No' value='".$_SESSION['locationid']."'>
						<input type='hidden' name='userid' placeholder='Transaction No' value='".$_SESSION['userid']."'>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='tgl' placeholder='Tanggal' value='".$waktu."'>
					  </div>
					</div>
				  </div>
				</li>
				               <li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='title' placeholder='Title' value=''>
					  </div>
					</div>
				  </div>
				</li>
                                <li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<textarea name='message'></textarea>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					   
     
    <div class='item-file'>
    <input type='file' name='pic'  />
</div>
					</div>
				  </div>
				</li>

			</ul>
		  </div>

<input type='submit' class='button button-fill color-blue' value='Send'>
   
    </form>

      </div>

    </div>


              



      </div>

    </div>
  </div>
</div>";
echo $html;
?>
