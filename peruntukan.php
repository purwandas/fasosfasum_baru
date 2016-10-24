<?php
if (isset($_POST['submit'])){
  include("config_dir.php");
  if(mysql_num_rows(mysql_query("select * from upload"))==0){
    $namabaru=$namadefault;
  }else{
    $nama=mysql_fetch_array(mysql_query("select * from upload order by id desc"));
    $ext=end(explode('.', $nama['nama_file']));      
    $namanya=basename($nama['nama_file'],".".$ext);
    // echo $namanya;
    $namabaru=incrementName($namanya);
  }
  $ext=end(explode('.', $_FILES['fileacuan']['name']));
  $target_file = $target_dir . "$namabaru.".$ext;
  $nobast = $_POST['nobast'];
  $tglbast= $_POST['tglbast'];
  $pengembangbast= $_POST['pengembangbast'];
  $perihalbast= $_POST['perihalbast'];
  $keterangan= $_POST['keterangan'];
  $nodokacuan= $_POST['nodokacuan'];
  $kodearsip=$_POST['kodearsip'];




  $check = mysql_query("SELECT nobast FROM bast WHERE nobast = '$nobast'") or die(mysql_error());
  $check2 = mysql_num_rows($check);

      //if the name exists it gives an error
  if ($check2 != 0)
  {
    ?>
    <!-- <script type="text/javascript">
     alert("BAST No:  <?php echo $nobast; ?> has already registered.");
     history.back();
   </script> -->
   <?php

  }
  else
  {
    if($_FILES['fileacuan']['name']!='')
    {
      if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) {
        $namafile=$_FILES['fileacuan']['name'];
        $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `nodokacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '', '$nobast');");
        $query = mysql_query("insert into bast values('$nobast', '$tglbast', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '$kodearsip')") or die(mysql_error());
      // echo "The file <a href='$target_dir$namabaru.$ext'>". basename( $_FILES["fileacuan"]["name"]). "</a> has been uploaded.";
      } 
      else 
      {
        // echo "$target_file";
        echo "Sorry, there was an error uploading your file.";
      }
    }
    else
    {
      $query = mysql_query("insert into bast values('$nobast', '$tglbast', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '$kodearsip')") or die(mysql_error());

    }
  

    //simpan data ke database

  if ($query) {
   // echo 'input data bast  berhasil........... No BAST :  ' ;
   // echo  $nobast;
   }

   //2---------------------------------
   $nobastlokasi = $nobast;
   $query = mysql_query("insert into lokasidokumen values('$nobastlokasi', '0', '0', '0', '0','0', '0', '0', '0','0','0','0','0')") or die(mysql_error());
   
   if (isset($_POST['pulomas'])) 
   {
     $query = mysql_query("update lokasidokumen set  pulomas='1'   where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  pulomas='0'   where nobastlokasi='$nobastlokasi'") or die(mysql_error());



   if (isset($_POST['rekon163']))
   {
     $query = mysql_query("update lokasidokumen set  rekon163='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  rekon163='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());


   if (isset($_POST['rekon54']))
   {
     $query = mysql_query("update lokasidokumen set  rekon54='1'  where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  rekon54='0'  where nobastlokasi='$nobastlokasi'") or die(mysql_error());


   if (isset($_POST['rekon101']))
   {
     $query = mysql_query("update lokasidokumen set  rekon101='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  rekon101='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());


   if (isset($_POST['rekon129']))
   {
     $query = mysql_query("update lokasidokumen set  rekon129='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  rekon129='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());

   if (isset($_POST['balaikota']))
   {
     $query = mysql_query("update lokasidokumen set  balaikota='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  balaikota='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());


   if (isset($_POST['tp3w']))
   {
     $query = mysql_query("update lokasidokumen set  tp3w='1'where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  tp3w='0'where nobastlokasi='$nobastlokasi'") or die(mysql_error());

   if (isset($_POST['lokasi58']))
   {
     $query = mysql_query("update lokasidokumen set  lokasi58='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  lokasi58='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());


   if (isset($_POST['dtr']))
   {
     $query = mysql_query("update lokasidokumen set  dtr='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  dtr='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());

   if (isset($_POST['bpk357']))
   {
     $query = mysql_query("update lokasidokumen set  bpk357='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  bpk357='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());

   if (isset($_POST['mutasi']))
   {
     $query = mysql_query("update lokasidokumen set  mutasi='1' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   }else $query = mysql_query("update lokasidokumen set  mutasi='0' where nobastlokasi='$nobastlokasi'") or die(mysql_error());
   // echo 'simpan perbahan data asal dokumen berhasil...........';

   $nobastaset=$nobast;
   
    //menyimpan data ke tabel dataaset
  foreach($_POST['alamataset'] as $key => $alamataset){  
    if($alamataset){
      $sql = "insert into dataaset(alamataset,wilayah,kecamatan,kelurahan,nobastaset,latitude,longitude)   
     values ('{$alamataset}','{$_POST['wilayah'][$key]}','{$_POST['kecamatan'][$key]}','{$_POST['kelurahan'][$key]}','{$_POST['nobast']}','{$_POST['latitude'][$key]}','{$_POST['longitude'][$key]}')";  
     mysql_query($sql);  
   } 
 }
 echo 'Data telah disimpan';  
 
}
}
?>

<article class="col-sm-12 col-md-12 col-lg-12">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Tambah Data Peruntukan</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding">
        <fieldset>
          <div class="row">
          
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <form action="peruntukanp.php" method="post" class="form-group">

                <div style=" overflow:auto;">

                  <table class="table table-striped table-bordered table-hover" >
                    <tr>
                      <td>Peruntukan</td>
                      <td>Jenis Fasos</td>
                      <td>Lokasi Aset</td>
                      <td>Jenis</td>
                      <td>Luas Kwjbn (M<sup>2</sup>)</td>
                      <td>Sertifikasi</td>
                      <td>Pemilik</td>
                      <td>Jenis Sertifikasi</td>
                      <td>Masa Berlaku</td>
                      <td>Keterangan</td>
                      <td>Status Laporan Keuangan</td>
                      <td>Status Recon</td>
                      <td>Status Sertifikat</td>
                      <td>No.Sertifikat</td>
                      <td>Tgl. Sertifikat</td>
                      <td>Luas Stfkt (M<sup>2</sup>)</td>
                      <td>Status Plang</td>
                      <td>Status Penggunaan</td>
                      <td>No.SK</td>
                      <td>Tgl. SK</td>
                      <td>SKPD</td>
                      <td>Sensus Fasos</td>
                    </tr>
                    <?php
                      $qrPeruntukan="select * from peruntukan where nodokacuan='$nodokacuan' order by nobast";
                      $queryP=mysql_query($qrPeruntukan);
                      while($d3=mysql_fetch_array($queryP))
                      {
                          
                          echo" 
                          <tr>
                            <td>
                              <input type='text' name='deskripsi[]' value='$d3[deskripsi]'>
                              <input type='hidden' name='nodokacuan[]' value='$d3[nodokacuan]'>
                              <input type='hidden' name='idperuntukan[]' value='$d3[idperuntukan]'>
                            </td>
                            <td>
                              <select name='jenisfasos[]' class='btn btn-sm btn-default'>
                                <option value='$d3[jenisfasos]'>$d3[jenisfasos]</option>
                              ";
                              $query=mysql_query("select display from ref_jenisfasosfasum order by id desc");
                              while ($dss=mysql_fetch_array($query)) 
                              {
                                echo"
                                <option value='$dss[display]'>
                                  $dss[display]
                                </option>
                                ";
                              }
                              if($d3['idaset']=='')
                              {$warna="class='btn btn-sm btn-success'";}
                              else
                              {$warna="class='btn btn-sm btn-default'";}
                                  
                              echo"
                              </select>
                            </td>
                            <td>
                              <select name='idaset[]' $warna>
                              ";
                                if($d3['idaset']=='')
                                {
                                  $queryCB="select nobast from bast where nodokacuan='$d3[nodokacuan]'";
                                  $qCariBast=mysql_query($queryCB);

                                  while ($dCariBast=mysql_fetch_array($qCariBast)) 
                                  {
                                    echo "<option value=''>-pilih-</option>";
                                    $query=mysql_query("select idaset, alamataset, kelurahan from dataaset where nobastaset='$dCariBast[nobast]'");
                                    while ($dset=mysql_fetch_array($query)) 
                                    {
                                      echo"
                                      <option value='$dset[idaset]'>
                                        $dset[alamataset] - $dset[kelurahan]
                                      </option>
                                      ";
                                    }
                                  }
                                }
                                else
                                {
                                  $qAset=mysql_query("select alamataset,kelurahan from dataaset where idaset='$d3[idaset]'");
                                  $dAset=mysql_fetch_array($qAset);
                                  echo"<option value='$d3[idaset]'>$dAset[alamataset] - $dAset[kelurahan]</option>";
                                  $query=mysql_query("select idaset, alamataset, kelurahan from dataaset where nobastaset='$d3[nobast]'");
                                  while ($dset=mysql_fetch_array($query)) 
                                  {
                                    echo"
                                    <option value='$dset[idaset]'>
                                      $dset[alamataset] - $dset[kelurahan] - $dBastAcuan[nobast]
                                    </option>
                                    ";
                                  }
                                }
                              
                              echo"
                              </select>
                            </td>
                            <td>
                              <select name='jenis[]' class='btn btn-sm btn-default'>
                                <option value='$d3[jenis]'>$d3[jenis]</option>
                                <option value='Tanah'>Tanah</option>
                                <option value='Non-Tanah'>Non-Tanah</option>
                              </select>
                            </td>
                            <td>
                              <input type='text' name='luas[]' value='$d3[luas]'>
                            </td>
                            <td>
                              <select name='sertifikasi[]' class='btn btn-sm btn-default'>
                                <option value='$d3[sertifikasi]'>$d3[sertifikasi]</option>
                                <option value='Non-Sertifikat'>Non-Sertifikat</option>
                                <option value='Sertifikat'>Sertifikat</option>
                              </select>
                            </td>
                            <td>
                              <input type='text' name='pemilik[]' value='$d3[pemilik]'>
                            </td>
                            <td>
                              <select name='jenissertifikat[]' class='btn btn-sm btn-default'>
                                <option value='$d3[jenissertifikat]'>$d3[jenissertifikat]</option>
                                <option value='Non-Sertifikat'>Non-Sertifikat</option>
                                <option value='SHM'>SHM</option>
                                <option value='HGB'>HGB</option>
                                <option value='DKI'>DKI</option>
                              </select>
                            </td>
                            <td>
                              <input type='text' name='masaberlaku[]' value='$d3[masaberlaku]'>
                            </td>
                            <td>
                              <input type='text' name='keterangan[]' value='$d3[keterangan]'>
                            </td>
                            <td>
                              <select name='statuslaporankeuangan[]' class='btn btn-sm btn-default'>
                                <option value='$d3[statuslaporankeuangan]'>$d3[statuslaporankeuangan]</option>
                                <option value='Masuk Laporan Keuangan'>Masuk Laporan Keuangan</option>
                                <option value='Sudah Dikeluarkan'>Sudah Dikeluarkan</option>
                              </select>
                            </td>
                            <td>
                              <select name='statusrecon[]' class='btn btn-sm btn-default'>
                                <option value='$d3[statusrecon]'>$d3[statusrecon]</option>
                                <option value='Sudah'>Sudah</option>
                                <option value='Belum'>Belum</option>
                              </select>
                            </td>
                            <td>
                              <select name='statussertifikat[]' class='btn btn-sm btn-default'>
                                <option value='$d3[statussertifikat]'>$d3[statussertifikat]</option>
                              ";
                                $query=mysql_query("select display from ref_statussertifikat order by id desc");
                                while ($dss=mysql_fetch_array($query)) 
                                {
                                  echo"
                                  <option value='$dss[display]'>
                                    $dss[display]
                                  </option>
                                  ";
                                }
                              echo"
                              </select>
                            </td>
                            <td>
                              <input type='text' name='nosertifikat[]' value='$d3[nosertifikat]'>
                            </td>
                            <td>
                            ";
                              echo"
                                <script>
                                  $( function() {
                                    $( '#tgl$d3[idperuntukan]' ).datepicker();
                                  } );
                                 </script>
                              ";
                            echo"
                              <input type='text' name='tglsertifikat[]' value='$d3[tglsertifikat]' id='tgl$d3[idperuntukan]'>
                            </td>
                            <td>
                              <input type='text' name='luassertifikat[]' value='$d3[luassertifikat]'>
                            </td>
                            <td>
                              <select name='statusplang[]' class='btn btn-sm btn-default'>
                                <option value='$d3[statusplang]'>$d3[statusplang]</option>
                              ";
                                $query=mysql_query("select display from ref_statusplangaset order by id desc");
                                while ($dss=mysql_fetch_array($query)) 
                                {
                                  echo"
                                  <option value='$dss[display]'>
                                    $dss[display]
                                  </option>
                                  ";
                                }
                              echo"
                              </select>
                            </td>
                            <td>
                              <select name='statuspenggunaan[]' class='btn btn-sm btn-default'>
                                <option value='$d3[statuspenggunaan]'>$d3[statuspenggunaan]</option>
                              ";
                                $query=mysql_query("select display from ref_statuspenggunaanfasosfasum order by id desc");
                                while ($dss=mysql_fetch_array($query)) 
                                {
                                  echo"
                                  <option value='$dss[display]'>
                                    $dss[display]
                                  </option>
                                  ";
                                }
                              echo"
                              </select>
                            </td>
                            <td>
                              <input type='text' name='nosk[]' value='$d3[nosk]'>
                            </td>
                            <td>
                            ";
                              echo"
                                <script>
                                  $( function() {
                                    $( '#tglsk$d3[idperuntukan]' ).datepicker();
                                  } );
                                 </script>
                              ";
                            echo"
                              <input type='text' name='tglsk[]' value='$d3[tglsk]' id='tglsk$d3[idperuntukan]'>
                            </td>
                            <td>
                              <input type='text' name='skpd[]' value='$d3[skpd]'>
                            </td>
                            <td>
                              <select name='sensusfasos[]' class='btn btn-sm btn-default'>
                                <option value='$d3[sensusfasos]'>$d3[sensusfasos]</option>
                              ";
                                $query=mysql_query("select display from ref_sensusfasosfasum order by id desc");
                                while ($dss=mysql_fetch_array($query)) 
                                {
                                  echo"
                                  <option value='$dss[display]'>
                                    $dss[display]
                                  </option>
                                  ";
                                }
                              echo"
                              </select>
                            </td>
                          </tr>
                        ";
                      }
                    ?>
                  </table>
                  
                </div>
              <input type="submit" name="peruntukan" value="Simpan Perubahan" class='btn btn-sm btn-default'>
              </form>
            </section>
            
          </div>
        </fieldset>
      </div>
    </div>
    <!-- end widget div -->

  </div>
  <!-- end widget -->

</article>
<!-- WIDGET END -->
