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
	<div class='content-block-title'>Stock</div>
      <div class='content-block'>
        <div class='card'>
	<div class='card-header'>Stock Request </div>
		  <div class='card-content'>

<form method='POST' action='prosesrequeststock.php'>
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
						<select name='itemid'><option value=''>-Pilih-</option>";
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


                <div class='card-header'>Stock Request List</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				

                                <div class='list-block accordion-list'>
				  <ul>

                                  ";

                                        $login=mysql_query("SELECT r.*,i.itemname,l.fullname as requestname,a.fullname as approvename FROM sky_stockrequest r
                                        	left outer join sky_item i on i.itemid = r.itemid
                                        	left outer join sky_loginmanager l on l.loginid = r.requestby
                                        	left outer join sky_loginmanager a on a.loginid = r.approveby	
                                         WHERE r.locationid='19' Order By requestdate DESC limit 0,10");

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
              <div class='item-title'>".$r['requestno']." - ".$approve."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>
              <p>Request No  :    ".$r['requestno']."</p>
              <p>Tanggal     :    ".$r['requestdate']."</p>
              <p>Nama Barang :    ".$r['itemname']."</p>
              <p>Qty      :    ".rupiah($r['qty'])."</p>
              <p>Keperluan   :    ".$r['des']."</p>
              <p>Request By  :    ".$r['requestname']."</p>
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
