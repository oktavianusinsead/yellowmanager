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
	<div class='card-header'>Recruitment Request </div>
		  <div class='card-content'>

<form method='POST' action='prosesrecruitment.php' enctype='multipart/form-data'>

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
						<select name='positionid'><option value=''>-Pilih Posisi-</option>";
                                                $sql1 = "SELECT *  FROM sky_position
                                                ";
		                                      $result1 = mysql_query($sql1);
		                                      while($row1=@mysql_fetch_array($result1)){
                                                if($row1[positionid]<>$_GET[positionid])
                                                   {
                                                    $html .= "<option value=".$row1["positionid"].">".$row1[position]."</option>";
                                                   }
                                                   else
                                                   {
                                                    $html .= "<option value=".$row1["positionid"]." selected>".$row1[position]."</option>";
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
						<input type='text' name='fullname' placeholder='Nama' value=''>
					  </div>
					</div>
				  </div>
				</li>

				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='ktpno' placeholder='No KTP' value=''>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='file' name='filektp' placeholder='Upload KTP' value=''>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='addr' placeholder='Alamat' value=''>
					  </div>
					</div>
				  </div>
				</li>

				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='dob' placeholder='DoB' value=''>
					  </div>
					</div>
				  </div>
				</li>
				
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						<input type='text' name='phone' placeholder='Telpon' value=''>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						Foto Staff<input type='file' name='fotostaff' placeholder='Foto' value=''>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						Foto Kontrak<input type='file' name='fotokontrak' placeholder='Foto Kontrak' value=''>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <div class='item-content'>
					<div class='item-inner'>
					  <div class='item-input'>
						Download Surat Pernyataan <a href='doc/surat.pdf'>Disini</a>
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


                <div class='card-header'>Recruitment Request List</div>
		  <div class='card-content'>
			<div class='card-content-inner'>
				<form method='POST' action='proses.php'>\n

                                <div class='list-block accordion-list'>
				  <ul>

                                  ";

                                        $login=mysql_query("SELECT r.*,p.position FROM sky_recruitment r
                                        	left outer join sky_position p on p.positionid = r.positionid
                                         WHERE r.locationid='".$_SESSION['locationid']."'");

while($r=mysql_fetch_array($login))

{
				               $html.="
					<li class='accordion-item'><a href='#' class='item-content item-link'>
            <div class='item-inner'>
              <div class='item-title'>".$r['fullname']."</div>
            </div></a>
            <div class='accordion-item-content'>
            <div class='content-block'>
              <p>Recruitment No  :    ".$r['recruitmentno']."</p>
              <p>Tanggal     :    ".$r['recruitmentdate']."</p>
              <p>Fullname      :    ".$r['fullname']."</p>
              <p>Jabatan   :    ".$r['position']."</p>
              
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
