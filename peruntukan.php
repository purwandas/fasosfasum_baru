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
    <script type="text/javascript">
     alert("BAST No:  <?php echo $nobast; ?> has already registered.");
     history.back();
   </script>
   <?php

   }else
   {
   if($_FILES['fileacuan']['name']!='')
   {
   if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) {
    $namafile=$_FILES['fileacuan']['name'];
    $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `nodokacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '', '$nobast');");
    $query = mysql_query("insert into bast values('$nobast', '$tglbast', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '$kodearsip')") or die(mysql_error());
    // echo "The file <a href='$target_dir$namabaru.$ext'>". basename( $_FILES["fileacuan"]["name"]). "</a> has been uploaded.";
    } else {
      // echo "$target_file";
      echo "Sorry, there was an error uploading your file.";
    }
  }else{
    $query = mysql_query("insert into bast values('$nobast', '$tglbast', '$perihalbast', '$pengembangbast', '$keterangan', '$nodokacuan', '$kodearsip')") or die(mysql_error());

  }
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
 // echo 'Data telah disimpan';  
 
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
              <div style=" overflow:auto;">

               <table class="table table-bordered table-striped" width="530" border="1" cellpadding="5" cellspacing="1">
                   <tr>
                     <td class="center">No.</td>          
                     <td class="center">No.BAST</td>
                     <td class="center">Tgl.BAST</td>
                     <td class="center">Pengembang</td>
                     <td class="center">Lokasi Aset</td>
                     <td class="center">Kelurahan</td>
                     <td class="center">Kecamatan</td>
                     <td class="center">Action</td> 
                   </tr>
                 <?php
                 
                 $query = mysql_query("select * from bast b inner join dataaset d on b.nobast=d.nobastaset where nobast='$nobast'");

                 $no = 1;
                 while ($data = mysql_fetch_array($query)) {
                   ?>
                     <tr>
                       <td class="center"><?php echo $no; ?></td>
                       <td class="left"><?php echo $data['nobast']; ?></td>
                       <td class="center"><?php echo $data['tglbast']; ?></td>
                       <td class="left"><?php echo $data['pengembangbast']; ?></td>
                       <td class="left"><?php echo $data['alamataset']; ?></td>
                       <td class="left"><?php echo $data['kelurahan']; ?></td>
                       <td class="left"><?php echo $data['kecamatan']; ?></td>
                       <td class="center"><a href="index.php?hal=entryperuntukan&id=<?php echo $data['idaset']; ?>">Input Data Peruntukan</a></td>

                     </tr>
                   <?php
                   $no++;
                 }
                 ?>
               </table>
             </div>
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
