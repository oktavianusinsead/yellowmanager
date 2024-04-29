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
    <div class='center sliding'>Stock Request</div>
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
	<div class='content-block-title'>Stock Transfer</div>
      <div class='content-block'>
        <div class='card'>
	<div class='card-header'>Stock Transfer Request </div>
		  <div class='card-content'>

<form method='POST' action='prosesstocktransfer.php'>
        <div class='list-block inset card'>
			<ul>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='transactionno' placeholder='Transaction No' value='".$notransaksi."'>
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
						<select name='to'><option value=''>-Pilih Location-</option>";
                                                $sql1 = "SELECT *  FROM sky_location where locationid not in ('".$_SESSION['locationid']."')
                                                ";
		                                      $result1 = mysql_query($sql1);
		                                      while($row1=@mysql_fetch_array($result1)){
                                                if($row1[locationid]<>$_GET[locationid])
                                                   {
                                                    $html .= "<option value=".$row1["locationid"].">".$row1[locationname]."</option>";
                                                   }
                                                   else
                                                   {
                                                    $html .= "<option value=".$row1["locationid"]." selected>".$row1[locationname]."</option>";
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
						<select name='itemid'><option value=''>-Pilih Item-</option>";
                                                $sql1 = "SELECT *  FROM sky_item where itemtypeid ='3'
                                                ";
		                                      $result1 = mysql_query($sql1);
		                                      while($row1=@mysql_fetch_array($result1)){
                                                if($row1[itemid]<>$_GET[itemid])
                                                   {
                                                    $html .= "<option value=".$row1["itemid"].">".$row1[itemname]."</option>";
                                                   }
                                                   else
                                                   {
                                                    $html .= "<option value=".$row1["itemid"]." selected>".$row1[itemname]."</option>";
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
						<input type='text' name='qty' placeholder='Qty' value=''>
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

    </div>


                <div class='card-header'>Stock Transfer Request List</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				

                                <div class='list-block accordion-list'>
				  <ul>

                                  ";

                                        $login=mysql_query("SELECT r.*,i.itemname,l.fullname as requestname,a.fullname as approvename,c.locationname as dari,c1.locationname as kirim FROM sky_stocktransfer r
                                        	left outer join sky_item i on i.itemid = r.itemid
                                        	left outer join sky_loginmanager l on l.loginid = r.requestby
                                        	left outer join sky_loginmanager a on a.loginid = r.approveby
                                        	left outer join sky_location c  on c.locationid = r.locationid
                                        	left outer join sky_location c1  on c1.locationid = r.kirimke
                                        		
                                         WHERE r.locationid='19' Order By transferdate DESC limit 0,10");

while($r=mysql_fetch_array($login))

{
if($r['approve']=='x')
{
	$approve="Approve";
	$status="<p>Status   :    ".$approve."</p>
   <p>Approve By   :    ".$r['approvename']."</p>
   <p>Approve Date   :    ".$r['approvedate']."</p>
	";
}
else
{
	$approve="Not Approve";
	$status="<p>Status   :    ".$approve."</p>
  
	";
}	
				               $html.="
					<li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>".$r['transferno']." - ".$approve."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>
              <p><strong>Request No  :</strong>    ".$r['transferno']."</p>
              <p><strong>Tanggal     :</strong>    ".$r['transferdate']."</p>
              <p><strong>Dari        :</strong>    ".$r['dari']."</p>
              <p><strong>Kepada      :</strong>    ".$r['kirim']."</p>
               <p>------------------------------------------------</p>
              <p><strong>Nama Barang :</strong>    ".$r['itemname']."</p>
              <p><strong>Qty      :</strong>    ".rupiah($r['qty'])."</p>
              <p><strong>Keperluan   :</strong>    ".$r['des']."</p>
              <p><strong>Request By  :</strong>    ".$r['requestname']."</p>
              ".$status."
              
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
