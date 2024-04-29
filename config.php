<?php
$server = "103.253.115.73";
$username = "dboasis";
$password = "k1mmy1";
$database = "yellow";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");


function get_no($type){
	
	global $db_tableprefix;
	
	$con = db_connect();
	$sql = "SELECT *"
		." FROM sky_nomor "
		." WHERE nomortype='".$type."'";
	
	$result = mysql_query($sql,$con);
	if ($result!=false){
			while ($row =@ mysql_fetch_array($result)){
				$last = $row[count];
				$nomortype=$row[nomorformat];
            $hari = date("d-m-Y");
            $month=date("m",strtotime($hari));
            $year=date("y",strtotime($hari));
            $branch=$_SESSION["cms_branch"];
            $nomor= strlen($last);
            $nomorbaru=$last + 1;
            if ($nomor =='1'){

            $perm=$nomortype."000".$last;
            }
            elseif ($nomor =='2'){
            $perm=$nomortype."00".$last;
            }
            elseif ($nomor =='3'){
            $perm=$nomortype."0".$last;
            }
            elseif ($nomor =='4'){
            $perm=$nomortype.$last;
            }

            }
          $result = $perm;



	} else {
		$result = "";
	}
	return $result;
}

function rupiah($rp){
      $rupiah="";
      $p=strlen($rp);
      while($p>3){
            $rupiah=",".substr($rp,-3).$rupiah;
            $l=strlen($rp)-3;
            $rp=substr($rp,0,$l);
            $p=strlen($rp);
      }
      $rupiah=$rp.$rupiah;
      return $rupiah;
}

?>
