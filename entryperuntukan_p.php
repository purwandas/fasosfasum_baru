<?php
include "koneksi.php";
require_once('auth.php');

if (isset($_POST['submit'])){
  foreach($_POST['deskripsi'] as $key => $value){
    if($value){

      $query="UPDATE `peruntukan` SET deskripsi='$value', jenis='".$_POST['jenis'][$key]."', luas='".$_POST['luas'][$key]."', sertifikasi='".$_POST['sertifikasi'][$key]."', pemilik='".$_POST['pemilik'][$key]."', jenissertifikat='".$_POST['jenissertifikat'][$key]."', masaberlaku='".$_POST['masaberlaku'][$key]."', keterangan='".$_POST['keterangan'][$key]."', statuslaporankeuangan='".$_POST['statuslaporankeuangan'][$key]."', statusrecon='".$_POST['statusrecon'][$key]."', nobast='".$_POST['nobast']."', idaset='".$_POST['noaset']."', statussertifikat='".$_POST['statussertifikat'][$key]."', nosertifikat='".$_POST['nosertifikat'][$key]."', tglsertifikat='".$_POST['tglsertifikat'][$key]."', luassertifikat='".$_POST['luassertifikat'][$key]."', statusplang='".$_POST['statusplang'][$key]."', statuspenggunaan='".$_POST['statuspenggunaan'][$key]."', nosk='".$_POST['nosk'][$key]."', tglsk='".$_POST['tglsk'][$key]."', skpd='".$_POST['skpd'][$key]."', sensusfasos='".$_POST['sensusfasos'][$key]."', jenisfasos='".$_POST['jenisfasos'][$key]."' WHERE `idperuntukan` ='".$_POST['idperuntukan'][$key]."'";
// echo $query;
      $query = mysql_query($query) or die(mysql_error());

    }
    // echo 'Input data peruntukan berhasil .....';
  }

  mysql_connect("localhost","root","");
  mysql_select_db("phplogin");
  $waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
  $user = $_SESSION['SESS_FIRST_NAME'];
  $query="insert into loging values('','$user','entry peruntukan akun nobast : ".$_POST['nobast']."','$waktu')";
// echo $query;

  $query = mysql_query($query) or die(mysql_error());

  if($query){
    header("Location:index.php?hal=entryperuntukan&id=$_POST[noaset]");
  }
}
?>