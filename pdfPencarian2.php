<?php
session_start();
if(isset($_GET['q'])){
    
    //create MySQL connection   
    $sql = $_GET['q'];
    if($_GET['k']==2){
        $select="select bast.nobast, bast.tglbast, dokumenacuan.jenisdokumen, bast.nodokacuan, detaildokacuan.tgldokacuan, bast.pengembangbast, peruntukan.deskripsi, dataaset.alamataset, dataaset.kelurahan, dataaset.kecamatan, dataaset.wilayah, akun.kategoriaset, akun.volume, akun.satuan, akun.nilaimix, bast.keterangan 
            from bast inner join detaildokacuan on bast.nodokacuan=detaildokacuan.nodokacuan
            inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori
            inner join dataaset on bast.nobast=dataaset.nobastaset
            inner join peruntukan on dataaset.idaset=peruntukan.idaset
            inner join akun on peruntukan.idperuntukan=akun.idperuntukan ";
        $sql=$select.substr($sql,343);
    }

    include 'koneksi.php';  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Export PDF</title>
  <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <!-- FAVICONS -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <style>
    /*thead, tfoot { display: table-row-group }*/

/*The table row page-break logic is now disabled by default. You will have*/
/*to enable it for specific rows or for all tables via CSS:*/

tr { page-break-inside: avoid }
    /*td{
        page-break-after: always;
        page-break-inside: avoid;
        page-break-inside: avoid !important;
    }*/
  </style>
</head>
<body>
  <div>
    <div class='col-md-12'>
      <center>
        <table>
          <tr>
            <td>
              <img src='img/logoDkiJakarta.png' style='width: 75px;'>
            </td>
            <td>
              <h1>
              Badan Pengelola Keuangan Daerah<br/>
              Pemerintah Provinsi DKI Jakarta
              </h1>
            </td>
          </tr>
        </table>
      </center>
      <br>
    </div>
    <div class='col-md-12'>
      <!-- <?php
        // echo $sql."lol";
      ?> -->
      <table class='table table-bordered table-hover table-striped'>
        <tr>
          <td rowspan='2'><strong>No.</strong></td>
          <td colspan='2'><strong>No. Bast</strong></td>
          <td><strong>Tgl. Bast</strong></td>
          <td><strong>Jenis Acuan</strong></td>
          <td colspan='2'><strong>No. Dok. Acuan</strong></td>
          <td><strong>Tgl. Acuan</strong></td>
          <td><strong>Pengembang</strong></td>
          <td><strong>Peruntukan</strong></td>
        </tr>
         <tr>
          <td><strong>Alamat</strong></td>
          <td><strong>Kelurahan</strong></td>
          <td><strong>Kecamatan</strong></td>
          <td><strong>Wilayah</strong></td>
          <td><strong>KIB</strong></td>
          <td class='text-right'><strong>Volume</strong></td>
          <td><strong>Satuan</strong></td>
          <td class='text-right'><strong>Nilai (Rp)</strong></td>
          <td><strong>Penandatangan BAST</strong></td>
        </tr>
<?php
  $no=0;
  // echo $sql." <-lol";
  $sql=mysql_query($sql);
  while ($d=mysql_fetch_array($sql)) {
    $no++;
    echo"
      <tr>
        <td rowspan='1'>$no</td>
        <td colspan='2'>$d[nobast]</td>
        <td>$d[tglbast]</td>
        <td>$d[jenisdokumen]</td>
        <td colspan='2'>$d[nodokacuan]</td>
        <td>$d[tgldokacuan]</td>
        <td>$d[pengembangbast]</td>
        <td>$d[deskripsi]</td>
      </tr>
      <tr>
        <td></td>
        <td>$d[alamataset]</td>
        <td>$d[kelurahan]</td>
        <td>$d[kecamatan]</td>
        <td>$d[wilayah]</td>
        <td>$d[kategoriaset]</td>
        <td class='text-right'>$d[volume]</td>
        <td>$d[satuan]</td>
        <td class='text-right'>".number_format($d['nilaimix'])."</td>
        <td>$d[keterangan]</td>
      </tr>
    ";
  }
?>
      </table>
    </div>
  </div>
</body>
</html>
<?php
}
?>