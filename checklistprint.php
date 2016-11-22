<?php
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
      <table class='table table-bordered table-hover'>
        <tr>
          <td><b>No.</b></td>
          <td><b>Nama Dokumen</b></td>
          <td><b>Checklist</b></td>
        </tr>
        <?php
          $queryGroupCheckList=mysql_query("select * from checklistgroup");
          while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
          {
            echo"
              <tr>
                <td colspan=3> 
                  <b>$dataGroupCheckList[kodegroup]. $dataGroupCheckList[deskripsi]</b>
                </td>
              </tr>
            ";
            $no=0;
            $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
            while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
            {
              $no++;
              echo"
              <tr>
                <td>$no</td>
                <td>$dataCheckList[ket]</td>
                <td>
                  <center><img src='/img/check.png' height='20px'></center>
                </td>
              </tr>
              ";
            }
          }
        ?>
      </table>
      <div align='right'>
        .... , .....................
        <br><br><br>
        ............................
      </div>
    </div>
  </div>
</body>
</html>