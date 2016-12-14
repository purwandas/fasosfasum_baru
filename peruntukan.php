<?php
if (isset($_POST['submit'])){
  include("config_dir.php");
  include"tracking.php";
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
  $tglbastd=substr($tglbast, -4).'-'.substr($tglbast, 0,2)."-".substr($tglbast, 3,2);
  $tglbast=substr($tglbast,3,2).'/'.substr($tglbast,0,2).'/'.substr($tglbast,-4);
  $pengembangbast= $_POST['pengembangbast'];
  $perihalbast= $_POST['perihalbast'];
  $keterangan= $_POST['keterangan'];
  $idacuan= $_POST['nodokacuan'];

  $selectNodokacuan=mysql_query("select nodokacuan from detaildokacuan where idacuan='$idacuan'");
  $selectNodokacuan=mysql_fetch_array($selectNodokacuan);
  $nodokacuan=$selectNodokacuan['nodokacuan'];
  $kodearsip="";
  // $_POST['kodearsip'];


  $check = mysql_query("SELECT nobast FROM bast WHERE nobast = '$nobast'") or die(mysql_error());
  $check2 = mysql_num_rows($check);

      //if the name exists it gives an error
  if ($check2 != 0)
  {
    ?>
    <script type="text/javascript">
     alert("BAST No:  <?php echo $nobast; ?> has already registered.");
     history.back();
   </script>
   <?php

  }
  else
  {
    $qUpdateChecklist=mysql_query("update checklistdetail set nobast='$nobast' where nobast='-NOBAST'");
    if($_FILES['fileacuan']['name']!='')
    {
      if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) {
        $namafile=$_FILES['fileacuan']['name'];
        $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `idacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '', '$nobast');");

        $query ="INSERT INTO `bast` (`nobast`, `tglbast`, `tglbastd`, `perihalbast`, `pengembangbast`, `keterangan`, `nodokacuan`, `checklistwalikota`, `statuschecklist`) VALUES ('$nobast', '$tglbast', '$tglbastd', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '1', '1')";
        // insert into bast values('$nobast', '$tglbast', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '$kodearsip')";
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
      $query ="INSERT INTO `bast` (`nobast`, `tglbast`, `tglbastd`, `perihalbast`, `pengembangbast`, `keterangan`, `nodokacuan`, `checklistwalikota`, `statuschecklist`) VALUES ('$nobast', '$tglbast', '$tglbastd', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '1', '1')";

    }
  
    // echo "$query <-- queryBAST<br>";
    if($query=mysql_query($query))
    {
      tracking("Tambah BAST: $nobast");
    }else{
      echo mysql_error($koneksi);
    }

   $nobastaset=$nobast;
   
    //menyimpan data ke tabel dataaset
  foreach($_POST['alamataset'] as $key => $alamataset){  
    if($alamataset){
      $sql = "insert into dataaset(alamataset,wilayah,kecamatan,kelurahan,nobastaset,latitude,longitude)   
     values ('{$alamataset}','{$_POST['wilayah'][$key]}','{$_POST['kecamatan'][$key]}','{$_POST['kelurahan'][$key]}','{$_POST['nobast']}','{$_POST['latitude'][$key]}','{$_POST['longitude'][$key]}')";  
     // echo "$sql";
     if($sql=mysql_query($sql))
     {
      tracking("Tambah Lokasi Aset: $alamataset ($nobast)");
     }
   } 
 }
 
}
}
// $nodokacuan="DOKACUAN";
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
                <script type="text/javascript">
                  $(function(){
                    $(".luas").keyup(function(){
                      var volume = $(this).parent().next().next().next().next().next().next().next().next().next().next().next().next().next().next().next().next().next().next().next().next().find('.volume');
                      $(volume).val($(this).val());
                    });
                    $(".volume").keyup(function(){
                      var jmlnjop = $(this).parent().next().next().next().find('.jmlnjop');
                      var nilainjop = $(this).parent().next().next().find('.nilainjop');
                      $(jmlnjop).val($(this).val() * $(nilainjop).val());
                    });
                    $(".nilainjop").keyup(function(){
                      var jmlnjop = $(this).parent().next().find('.jmlnjop');
                      var volume = $(this).parent().prev().prev().find('.volume');
                      $(jmlnjop).val($(this).val()*$(volume).val());
                    });
                  });
                </script>
                <div style=" overflow:auto;">
                <input type="hidden" name="nobast" value="<?php echo $nobast; ?>">
                <input type="hidden" name="sippt" value="<?php echo $idacuan; ?>">
                <input type="hidden" name="pengembang" value="<?php echo $pengembangbast; ?>">
                  <table class="table table-striped table-bordered table-hover" >
                    <tr>
                      <td><b>Peruntukan</b></td>
                      <td><b>Jenis Fasos</b></td>
                      <td><b>Lokasi Aset</b></td>
                      <!-- <td><b>Jenis</b></td> -->
                      <td><b>Luas / Jumlah Kewajiban</b></td>
                      <!-- <td><b>Sertifikasi</b></td> -->
                      <td><b>Pemilik</b></td>
                      <td><b>No. KRK</b></td>
                      <td><b>No. IMB</b></td>
                      <td><b>No. Blok Plan</b></td>
                      <!-- <td><b>Jenis Sertifikasi</b></td> -->
                      <td><b>Masa Berlaku</b></td>
                      <td><b>Keterangan</b></td>
                      <td><b>Status Laporan Keuangan</b></td>
                      <td><b>Status Recon</b></td>
                      <td><b>Status Sertifikat</b></td>
                      <td><b>No.Sertifikat</b></td>
                      <td><b>Tgl. Sertifikat</b></td>
                      <td><b>Luas Stfkt (M<sup>2</sup>)</b></td>
                      <td><b>Status Plang</b></td>
                      <td><b>Status Penggunaan</b></td>
                      <td><b>No.SK</b></td>
                      <td><b>Tgl. SK</b></td>
                      <td><b>SKPD</b></td>
                      <td><b>Sensus Fasos</b></td>
                      <td><b>Kategori Aset</b></td>
                      <td><b>Volume / Jumlah</b></td>
                      <td><b>Satuan</b></td>
                      <td><b>Nilai Pengali (Rp)</b></td>
                      <td><b>Penilaian PerGub 132 (Rp)</b></td>
                      <td><b>Nilai BAST (Rp)</b></td>
                      <td><b>Nilai Kombinasi (Rp)</b></td>
                      <td><b>Keterangan</b></td>
                    </tr>
                    <?php
                      $qrPeruntukan="select * from kewajiban where idacuan='$idacuan' and luas>0 or luas like '-%'";
                      $queryP=mysql_query($qrPeruntukan);
                      while($d3=mysql_fetch_array($queryP))
                      {
                          
                          echo" 
                          <tr>
                            <td>
                              <input type='text' name='deskripsi[]' value='$d3[deskripsi]'>
                              <input type='hidden' name='nodokacuan[]' value='$d3[nodokacuan]'>
                              <input type='hidden' name='idkewajiban[]' value='$d3[idkewajiban]'>
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
                              
                                  
                              echo"
                              </select>
                            </td>
                            <td>
                              <select name='idaset[]' class='btn btn-sm btn-default'>
                              ";
                                
                                  // $queryCB="select nobast from bast where nodokacuan='$d3[nodokacuan]'";
                                  // $qCariBast=mysql_query($queryCB);
                                  echo "<option value=''>-pilih-</option>";

                                  // while ($dCariBast=mysql_fetch_array($qCariBast)) 
                                  // {
                                    $query=mysql_query("select idaset, alamataset, kecamatan, kelurahan from dataaset where nobastaset='$nobast'");
                                    while ($dset=mysql_fetch_array($query)) 
                                    {
                                      echo"
                                      <option value='$dset[idaset]'>
                                        $dset[alamataset] - $dset[kelurahan] - $dset[kecamatan]
                                      </option>
                                      ";
                                    }
                                  // }
                                
                            //< td>
                            //   <select name='jenis[]' class='btn btn-sm btn-default'>
                            //     <option value='Tanah'>Tanah</option>
                            //     <option value='Non-Tanah'>Non-Tanah</option>
                            //   </select>
                            // </td>    
                                    if(substr($d3['luas'],0,1)=='-')
                                    {
                                      $d3luas='-';
                                    }else{
                                      $d3luas=$d3['luas'];
                                    }
                              
                              echo"
                              </select>
                            </td>
                            
                            <td>
                              <input type='text' name='luas[]' readonly value='$d3luas' class='luas'>
                              <input type='hidden' name='kewajiban[]' value='$d3luas'>
                              <input type='hidden' name='pelunasan[]' value='$d3[pelunasan]'>
                            </td>
                            <td>
                              <input type='text' name='pemilik[]'>
                            </td>
                            <td>
                              <input type='text' name='nokrk[]'>
                            </td>
                            <td>
                              <input type='text' name='noimb[]'>
                            </td>
                            <td>
                              <input type='text' name='noblokplan[]'>
                            </td>
                            <td>
                              <input type='text' name='masaberlaku[]'>
                            </td>
                            <td>
                              <input type='text' name='keterangan[]'>
                            </td>
                            <td>
                              <select name='statuslaporankeuangan[]' class='btn btn-sm btn-default'>
                                <option value='Masuk Laporan Keuangan'>Masuk Laporan Keuangan</option>
                                <option value='Sudah Dikeluarkan'>Sudah Dikeluarkan</option>
                              </select>
                            </td>
                            <td>
                              <select name='statusrecon[]' class='btn btn-sm btn-default'>
                                <option value='Sudah'>Sudah</option>
                                <option value='Belum'>Belum</option>
                              </select>
                            </td>
                            <td>
                              <select name='statussertifikat[]' class='btn btn-sm btn-default'>
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
                              <input type='text' name='nosertifikat[]'>
                            </td>
                            <td>
                            ";
                              echo"
                                <script>
                                  $( function() {
                                    $( '#tgl$d3[idkewajiban]' ).datepicker();
                                  } );
                                 </script>
                              ";
                            echo"
                              <input type='text' name='tglsertifikat[]' id='tgl$d3[idkewajiban]'>
                            </td>
                            <td>
                              <input type='text' name='luassertifikat[]'>
                            </td>
                            <td>
                              <select name='statusplang[]' class='btn btn-sm btn-default'>
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
                              <input type='text' name='nosk[]'>
                            </td>
                            <td>
                            ";
                              echo"
                                <script>
                                  $( function() {
                                    $( '#tglsk$d3[idkewajiban]' ).datepicker();
                                  } );
                                 </script>
                              ";
                            echo"
                              <input type='text' name='tglsk[]' id='tglsk$d3[idkewajiban]'>
                            </td>
                            <td>
                              <input type='text' name='skpd[]'>
                            </td>
                            <td>
                              <select name='sensusfasos[]' class='btn btn-sm btn-default'>
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
                            <td>
                              <select name='kategori[]' class='btn btn-sm btn-default'>
                                <option>KIB A</option>
                                <option>KIB B</option>
                                <option>KIB C</option>
                                <option>KIB D</option>
                                <option>KIB E</option>
                              </select>
                            </td>
                            <td>
                              <input type='text' id='volume' name='volume[]' class='volume' value='$d3luas'>
                            </td>
                            <td>
                              <select name='satuan[]' class='btn btn-sm btn-default'>
                                <option>m2</option>
                                <option>m</option>
                                <option>m1</option>
                                <option>m3</option>
                                <option>unit</option>
                                <option>set</option>
                                <option>titik</option>
                                <option>buah</option>
                                <option>paket</option>
                              </select>
                            </td>
                            <td><input type='text' id='nilainjop' name='nilainjop[]' class='nilainjop'></td>
                            <td><input type='text' id='jmlnjop' name='jmlnjop[]' class='jmlnjop'></td>
                            <td><input type='text' name='nilaibast[]'></td>
                            <td><input type='text' name='nilaimix[]'></td>
                            <td><input type='text' name='ketakun[]'></td>
                          </tr>
                        ";
                      }
                    ?>
                  </table>
                  
                </div>
              <input type="submit" name="peruntukan" value="Simpan Perubahan" class='btn btn-sm btn-info'>
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
