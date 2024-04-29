<?php
session_start();
include "config.php";

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
    <div class='center sliding'>Recruitment Request</div>
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
	<div class='content-block-title'>Recruitment</div>
      <div class='content-block'>
        <div class='card'>
	<div class='card-header'>Staff Lembur Request </div>
		  <div class='card-content'>

<form method='POST' action='proseslembur.php'>

        <div class='list-block inset card'>
			<ul>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='transactionno' placeholder='Recruitment No' value='".$notransaksi."'>
						<input type='hidden' name='userid' placeholder='Transaction No' value='".$_SESSION['userid']."'>
						<input type='hidden' name='locationid' placeholder='Transaction No' value='".$_SESSION['locationid']."'>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-text'>
						<select name='staffid'><option value=''>-Pilih Staff-</option>";
                                                $sql1 = "SELECT *  FROM sky_staff where inactive not in ('x') 
                                                ";
		                                      $result1 = mysql_query($sql1);
		                                      while($row1=@mysql_fetch_array($result1)){
                                                if($row1[staffid]<>$_GET[staffid])
                                                   {
                                                    $html .= "<option value=".$row1["staffid"].">".$row1[staffname]."</option>";
                                                   }
                                                   else
                                                   {
                                                    $html .= "<option value=".$row1["staffid"]." selected>".$row1[staffname]."</option>";
                                                   }
                                               }

                                                $html .= "</select>
					  </div>
					</div>
				  </div>
				</li>
                 <li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-text'>
						<select name='cardid'><option value=''>-Pilih Shift Lembur-</option>
<option value='1'>Lembur Pagi</option>
<option value='2'>Lembur Sore</option>
            ";
                                               
                                                $html .= "</select>
					  </div>
					</div>
				  </div>
				</li>
				<li>
          <div class='item-content'>
          <div class='item-inner'>
            <div class='item-input'>
            <input type='text' name='jammasuk' placeholder='Jam Masuk' value=''>
            </div>
          </div>
          </div>
        </li>
<li>
          <div class='item-content'>
          <div class='item-inner'>
            <div class='item-input'>
            <input type='text' name='jammasuk' placeholder='Jam Keluar' value=''>
            </div>
          </div>
          </div>
        </li>
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
