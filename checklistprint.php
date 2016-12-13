<?php
$jabatan="$_GET[j]";
// echo "$jabatan <- jabatan";
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
              <h6>Dicek Oleh</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td width="73%">
              <h6>
              <?php
                $tgl=getdate(date("U"));
                echo $_GET['b'].' / '.$_GET['a']." / $tgl[mday]-$tgl[mon]-$tgl[year]"; 
              ?>
              </h6>
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
          $optionalBast="select statuschecklist from bast where nobast='$nobast'";
          $optionalBast=mysql_query($optionalBast);
          $optionalBast=mysql_fetch_array($optionalBast);
              $optional=$optionalBast['statuschecklist'];
              if($optional=='1'){
                $optional='';
              }else if($optional=='2'){
                $optional=" where kodegroup!='B' ";
              }else if($optional=='3'){
                $optional=" where kodegroup!='A' ";
              }
            $group[0]='A';
            $group[1]='B';
            $group[2]='C';
            $nogroup=0;
          $queryGroupCheckList=mysql_query("select * from checklistgroup $optional");
          while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
          {
            echo"
              <tr>
                <td colspan=4> 
                  <b>".$group[$nogroup].". $dataGroupCheckList[deskripsi]</b>
                </td>
              </tr>
            ";
            $nogroup++;
            $no=0;
            $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
            while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
            {
              $no++;
                
                $cek="select * from checklistdetail where nobast='$nobast' and idchecklist='$dataCheckList[idchecklist]' ORDER BY `checklistdetail`.`no` DESC";
                // echo "$cek <-- cek<br>";
                $cek=mysql_query($cek);
                $cek=mysql_fetch_array($cek);

                if ($jabatan=='Walikota') 
                {
                  $user=$cek['user1'];
                  $user1=$cek['user1k'];
                }
                else if ($jabatan=='BPAD') 
                {
                  $user=$cek['user2'];
                  $user1=$cek['user2k'];
                }else{
                  $user=$cek['user3'];
                  $user1=$cek['user3k'];
                }

              if($dataCheckList['status']=='wajib')
              {
                // $img="<img src='/img/check.png' height='15px'>";
                $img=$user1;
              }else{
                // echo "$user <-- user<br>";
                if($user!='1')
                {
                  // $img="<img src='/img/cross.png' height='15px'>";
                  $img='-';
                }else{
                  // $img="<img src='/img/check.png' height='15px'>";
                  $img=$user1;
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
          ............................
          <br><br><br><br>
          ............................
        </center>
      </div>
    </div>
  </div>
</body>
</html>