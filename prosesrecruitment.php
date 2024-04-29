<?php
session_start();

include "config.php";
$recruitmentno=$_POST['transactionno'];
$fullname=$_POST['fullname'];
$positionid=$_POST['positionid'];
$locationid=$_POST['locationid'];
$userid=$_POST['userid'];
$ktpno=$_POST['ktpno'];
$ktpfile=$_POST['ktp']."jpg";
$dob=$_POST['dob'];
$pob=$_POST['pob'];
$phone=$_POST['phone'];
$addr=$_POST['addr'];
$foto=$_POST['fotostaff'];
$kontrak=$_POST['fotokontrak'];
//$jmlh=$_POST['jmlh'];
date_default_timezone_set('Asia/Jakarta');
			                  $waktu= date("y-m-d H:i:s");
			                  $startdate=date("y-m-d");
                                          $jam= date("H:i:s");

// Loop to store and display values of individual checked checkbox.
$picfile=$recruitmentno.".jpg";
move_uploaded_file($_FILES["fotostaff"]["tmp_name"],"../yellow/img/staff/".$picfile);
//move_uploaded_file($_FILES["photo"]["tmp_name"],"img/staff/".$picfile);
$ktpfile=$ktpno.".jpg";
move_uploaded_file($_FILES["ktpfile"]["tmp_name"],"ktp/".$ktpfile);

 $sql1 = "SELECT *  FROM sky_staff where staffno='".$recruitmentno."'";
		                                      $result1 = mysql_query($sql1);
		                                      $row1=@mysql_num_rows($result1);
		                                      if($row1>=1)
		                                      {
		                                      	header("Location: index2.php");
		                                      }
else
{

$login=mysql_query("INSERT INTO sky_recruitment (recruitmentno,recruitmentdate,fullname,positionid,locationid,ktpno,ktpfile,addr,dob,pob,telpon,foto,kontrak,useradd,dateadd) VALUES
               ('".$recruitmentno."','".$waktu."','".$fullname."','".$positionid ."','".$locationid."','".$ktpno."','".$ktpfile."','".$addr."','".$dob."','".$pob."','".$phone."','".$picfile."','".$kontrak."','".$userid."','".$waktu."')");

$login2=mysql_query("INSERT INTO sky_staff (staffno,staffname,dob,pob,gender,phone,addr,ktpno,photoktp,picfile,positionid,locationid,datestart) VALUES
               ('".$recruitmentno."','".$fullname."','".$dob."','".$pob ."','','".$phone."','".$addr."','".$ktpno."','".$ktpfile."','".$picfile."','".$positionid."','".$locationid."','".$startdate."')");


//                }


header("Location: index2.php");
}

?>