<?php
  include 'koneksi.php';  
?>
<!DOCTYPE html>
<html>
<head>
  <title>PDF Checklist</title>
  <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <!-- FAVICONS -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <style>
    .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
        border-color:#333;
        border-width: 0.5px;
      }
    tr { page-break-inside: avoid }
  </style>
</head>
<body>
  <div>
    <div class='col-md-12'>
      <center>
        <table>
          <tr>
            <td align="center" colspan="3">
              <h3>
                <STRONG>
                  DOKUMEN ADMINISTRASI SEBAGAI LAMPIRAN</BR>
                  BERITA ACARA SERAH TERIMA
                </STRONG>
              </h3>
            </td>
          </tr>
          <tr>
            <td valign="top" width="25%">
              <h6>Yang Diserahkan</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td width="73%">
              <h6>Tanah Kosong / Taman / Jalan / Saluran / Gedung / Bangunan Utilitas Umum - Sosial</h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Nama Pengembang</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6><?php echo $_GET['p']; ?></h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Nomor SIPPT</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6><?php echo $_GET['s']; ?></h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Nomor BAST</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6><?php echo $_GET['bast']; ?></h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Alamat</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6>
                <?php 
                  $ala=0;
                  $nobast=$_GET['bast']; 
                  $qalamat=mysql_query("select * from dataaset where nobastaset='$nobast'");
                  while ($dalamat=mysql_fetch_array($qalamat)) 
                  {
                    $ala++;
                    if($ala>1)
                    {
                      echo "<br>";
                    }
                    echo "
                      $dalamat[alamataset], Kel. $dalamat[kelurahan], Kec. $dalamat[kecamatan], $dalamat[wilayah]. 
                    ";
                  }

                ?>
              </h6>
            </td>
          </tr>
        </table>
      </center>
      <br>
    </div>
    <div class='col-md-12'>
      <table class='table table-bordered'>
        <tr>
          <td><b>No.</b></td>
          <td><b>Nama Dokumen</b></td>
          <td><b>Keterangan</b></td>
          <td><b>Checklist</b></td>
        </tr>
        <?php
          $queryGroupCheckList=mysql_query("select * from checklistgroup");
          while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
          {
            echo"
              <tr>
                <td colspan=4> 
                  <b>$dataGroupCheckList[kodegroup]. $dataGroupCheckList[deskripsi]</b>
                </td>
              </tr>
            ";
            $no=0;
            $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
            while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
            {
              $no++;
              if($dataCheckList['status']=='wajib')
              {
                $img="<img src='/img/check.png' height='15px'>";
              }else{
                $cek=mysql_query("select * from checklistdetail where nobast='$nobast' and idchecklist='$dataCheckList[idchecklist]'");
                $cek=mysql_fetch_array($cek);
                if($cek['user1']!='1')
                {
                  $img="<img src='/img/cross.png' height='15px'>";
                }else{
                  $img="<img src='/img/check.png' height='15px'>";
                }
              }
              echo"
              <tr>
                <td align='right'>$no</td>
                <td>$dataCheckList[ket]</td>
                <td align='center' valign='middle'>$dataCheckList[walikota]</td>
                <td align='center' valign='middle'>
                  <center>$img</center>
                </td>
              </tr>
              ";
            }
          }
        ?>
      </table>
      <div style="width:300px;float: right;">
        <br>
        <center>
          <?php echo $_GET['a']; ?>
          <br><br><br><br>
          <?php echo $_GET['b']; ?>
        </center>
      </div>
    </div>
  </div>
</body>
</html>