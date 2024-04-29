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
    <div class='center sliding'>Payment List</div>
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
	<div class='content-block-title'>Payment Cash</div>
      <div class='content-block'>
        <div class='card'>
	<div class='card-header'>Payment Request </div>
		  <div class='card-content'>

<form method='POST' action='prosespembayaran.php'>
        <div class='list-block inset card'>
			<ul>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='transactionno' placeholder='Transaction No' value='".$notransaksi."'>
						<input type='hidden' name='userid' placeholder='Transaction No' value='".$_SESSION['userid']."'>
						<input type='hidden' name='locationid' placeholder='Transaction No' value='".$_SESSION['locationid']."'>
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
					  <div class='item-text'>
						<select name='costid'><option value=''>-Pilih-</option>";
                                                $sql1 = "SELECT *  FROM sky_cost
                                                ";
		                                      $result1 = mysql_query($sql1);
		                                      while($row1=@mysql_fetch_array($result1)){
                                                if($row1[costid]<>$_GET[costid])
                                                   {
                                                    $html .= "<option value=".$row1["costid"].">".$row1[cost]."</option>";
                                                   }
                                                   else
                                                   {
                                                    $html .= "<option value=".$row1["costid"]." selected>".$row1[cost]."</option>";
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
					  <div class='item-input'>
						<input type='text' name='amount' placeholder='Amount' value=''>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='des' placeholder='Keperluan' value=''>
					  </div>
					</div>
				  </div>
				</li>

			</ul>
		  </div>
<input type='submit' class='button button-fill color-blue' value='Request'>
   
    </form>


      </div>

    </div>";
     $login2=mysql_query("SELECT sum(cost) as total FROM sky_costoperasional

                                         WHERE locationid='".$_SESSION['locationid']."'");

$r2=mysql_fetch_array($login2);


                $html.="<div class='card-header'>Payment Cash List - ".rupiah($r2['total'])."</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				

                                <div class='list-block accordion-list'>
				  <ul>

                                  ";

                                        $login=mysql_query("SELECT * FROM sky_costoperasional

                                         WHERE locationid='".$_SESSION['locationid']."'");

while($r=mysql_fetch_array($login))

{
				               $html.="
					<li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>".$r['costno']."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>
              <p>Request No  :    ".$r['costno']."</p>
              <p>Tanggal     :    ".$r['costdate']."</p>
              <p>Amount      :    ".rupiah($r['cost'])."</p>
              <p>Keperluan   :    ".$r['des']."</p>
              
            </div>
            </div>
          </li>";
}

				  $html.="</ul>
    </div>
			</div>
		  </div>
		</div>



      </div>

    </div>
  </div>
</div>";
echo $html;
?>
