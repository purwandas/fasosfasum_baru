<?php
  session_start();
  include"koneksi.php";
  include"tracking.php";

  //simpan data SIPPT
  if (isset($_POST['submit'])){

    include("config_dir.php");
    $nama=mysql_fetch_array(mysql_query("select * from upload order by id desc"));
    if($nama=='')
    {
      $namanya=$namadefault;
    }else{
      $ext=end(explode('.', $nama['nama_file']));      
      $namanya=basename($nama['nama_file'],".".$ext);  
    }
    // echo $namanya;
    $namabaru=incrementName($namanya);
    $ext=end(explode('.', $_FILES['fileacuan']['name']));
    $target_file = $target_dir . "$namabaru.".$ext;
    $idkategori=$_POST['idkategori'];
    
    $id=$_POST['nodokacuan'];

    $tgldokacuan= $_POST['tgldokacuan'];
    $cekTgl=mysql_query("select tgldokacuan from detaildokacuan where nodokacuan='$id' and versi='0'");
    $cekTgl=mysql_fetch_array($cekTgl);
    // echo "$cekTgl[tgldokacuan] != $tgldokacuan <-- tgl<br>";
    if($cekTgl['tgldokacuan']!=$tgldokacuan)
    {
      $tgldokacuand=substr($tgldokacuan, -4).'-'.substr($tgldokacuan, 0,2)."-".substr($tgldokacuan, 3,2);
      $tgldokacuan=substr($tgldokacuan, 3,2).'/'.substr($tgldokacuan, 0,2).substr($tgldokacuan, -5);
    }else{
      $tgldokacuand=substr($tgldokacuan,-4).'-'.substr($tgldokacuan, 3,2).'-'.substr($tgldokacuan, 0,2);
    }

    // $tgldokacuan=substr($tgl,3,2).'/'.substr($tgl,0,2).'/'.substr($tgl,-4);
    // $tgldokacuan=substr($tgldokacuan, 3,2).'/'.substr($tgldokacuan, 0,2).substr($tgldokacuan, -5);
    $haldokacuan= $_POST['haldokacuan'];
    $pemegangdokacuan= $_POST['pemegangdokacuan'];
    $ketdokacuan= $_POST['ketdokacuan'];
    $idacuan=$_POST['idacuan'];
    // $versi=$_POST['versi'];
$selectMaxIdacuan=mysql_query("select max(idacuan) as max from detaildokacuan"); 
$selectMaxIdacuan=mysql_fetch_array($selectMaxIdacuan); 
$idacuanMax=$selectMaxIdacuan['max']+1; 
$selectMaxVersi=mysql_query("select max(versi) as max from detaildokacuan where nodokacuan='$id'");
$selectMaxVersi=mysql_fetch_array($selectMaxVersi);
$idacuanMax=$selectMaxIdacuan['max']+1;
$versiMax=$selectMaxVersi['max']+1;

if($_FILES["fileacuan"]["tmp_name"]!='')
{
    if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) 
    {
      $namafile=$_FILES['fileacuan']['name'];
      //insert ke tabel upload (file acuan)
      $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `idacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '$idacuanMax', '');");
      //insert ke tabel detaildokacuan (sippt)
      $query="INSERT INTO `detaildokacuan` (`idacuan`, `nodokacuan`, `tgldokacuan`, `tgldokacuand`, `haldokacuan`, `pemegangdokacuan`, `ketdokacuan`, `idkategori`, `versi`) VALUES ('$idacuanMax', '$id', '$tgldokacuan', '$tgldokacuand', '$haldokacuan', '$pemegangdokacuan', '$ketdokacuan', '$idkategori', '$versiMax')";
    } else {
      echo "$target_file- ";
      echo "Sorry, there was an error uploading your file.";
    }
}else{
      //insert ke tabel detaildokacuan (sippt)
    $query="INSERT INTO `detaildokacuan` (`idacuan`, `nodokacuan`, `tgldokacuan`, `tgldokacuand`, `haldokacuan`, `pemegangdokacuan`, `ketdokacuan`, `idkategori`, `versi`) VALUES ('$idacuanMax', '$id', '$tgldokacuan', '$tgldokacuand', '$haldokacuan', '$pemegangdokacuan', '$ketdokacuan', '$idkategori', '$versiMax')";
}
    
  // echo "$query <-- update versi 0<br>";
    if ($query=mysql_query($query)) {
      tracking("Adendum Dok. Acuan: $id");
     // echo 'simpan perbahan dokumen acuan berhasil...........';
    }else{
      echo mysql_error($koneksi);
    }
// } 
//------------------------------------------------------------------------------

//simpan data kewajiban
 // if (isset($_POST['submit2'])){
   $nodokacuan2=$_POST['nodokacuan2'];
   // echo $nodokacuan2."lol";
   if(!$_POST){  
    die('Tidak ada data yang disimpan!');  
  }  
    //menyimpan data ke tabel kewajiban
  foreach($_POST['idkewajiban'] as $key => $idkewajiban){  
    if($idkewajiban){
      // echo ">--> $idperuntukan";
      
        if($_POST['deskripsi'][$key]!='')
        {
         $sql = "INSERT INTO `kewajiban` (`idkewajiban`, `idacuan`, `nodokacuan`, `deskripsi`, `jenisfasos`, `luas`, `pelunasan`) VALUES ('', '{$idacuanMax}', '{$nodokacuan2}', '{$_POST['deskripsi'][$key]}', '{$_POST['jenisfasos'][$key]}', '{$_POST['luas'][$key]}', '0');";
         $msg="Tambah Data Kewajiban baru(Adendum): {$_POST['deskripsi'][$key]} ($nodokacuan2)";
        }else{
          $sql="FAIL";
        }

      if($sql=mysql_query($sql))
      {
        tracking($msg);
      }
   // echo $sql."- >   $msg<br>"; 
    } 
  }
  // echo 'Data telah disimpan';  
  header("location: index.php?hal=lihatdokacuan");
}

//delete kewajiban
if(isset($_GET['delete'])){
  $qCekStatus="select status from kewajiban where idkewajiban='$_GET[delete]'";
  // echo "$qCekStatus";
  $qCekStatus=mysql_query($qCekStatus);
  $dCekStatus=mysql_fetch_array($qCekStatus);
  $cek=$dCekStatus['status'];
  // echo $cek."<--cek";
  if($cek==0)
  {
    $qdelete="update kewajiban set status='1' where idkewajiban='$_GET[delete]'";
    // echo "$qdelete";
    if($qdelete=mysql_query($qdelete))
    {
      tracking("Hapus Data Kewajiban: $_GET[delete]");
    }
  }
}

?>