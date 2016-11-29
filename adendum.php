<?php
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
    
$selectAcuanLama=mysql_query("select * from detaildokacuan where idacuan='$idacuan'");
$selectAcuanLama=mysql_fetch_array($selectAcuanLama);
$selectMaxIdacuan=mysql_query("select max(idacuan) as max from detaildokacuan");
$selectMaxIdacuan=mysql_fetch_array($selectMaxIdacuan);
$selectMaxVersi=mysql_query("select max(versi) as max from detaildokacuan where nodokacuan='$id'");
$selectMaxVersi=mysql_fetch_array($selectMaxVersi);
$idacuanMax=$selectMaxIdacuan['max']+1;
$versiMax=$selectMaxVersi['max']+1;
$insertAcuanLama="INSERT INTO `detaildokacuan` (`idacuan`, `nodokacuan`, `tgldokacuan`, `tgldokacuand`, `haldokacuan`, `pemegangdokacuan`, `ketdokacuan`, `idkategori`, `versi`) VALUES ('$idacuanMax', '$id', '$selectAcuanLama[tgldokacuan]', '$selectAcuanLama[tgldokacuand]', '$selectAcuanLama[haldokacuan]', '$selectAcuanLama[pemegangdokacuan]', '$selectAcuanLama[ketdokacuan]', '$selectAcuanLama[idkategori]', '$versiMax')";
// echo "$insertAcuanLama <-- Lama<br>";
$insertAcuanLama=mysql_query($insertAcuanLama);
$updateUpload="Update upload set idacuan='$idacuanMax' where idacuan='$idacuan'";
// echo "$updateUpload <-- uploadupd<br>";
$updateUpload=mysql_query($updateUpload);

if($_FILES["fileacuan"]["tmp_name"]!='')
{
    if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) 
    {
      $namafile=$_FILES['fileacuan']['name'];
      // if($idacuan!=''){
      //   $dupload=mysql_query("delete from upload where idacuan='$idacuan'");
      // }
      $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `idacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '$idacuan', '');");
      $query = "update detaildokacuan set  idkategori='$idkategori', tgldokacuan='$tgldokacuan', tgldokacuand='$tgldokacuand', haldokacuan='$haldokacuan',pemegangdokacuan='$pemegangdokacuan',ketdokacuan='$ketdokacuan' where idacuan='$idacuan'";
      // echo "The file <a href='$target_dir$namabaru.$ext'>". basename( $_FILES["fileacuan"]["name"]). "</a> has been uploaded.";
    } else {
      echo "$target_file- ";
      echo "Sorry, there was an error uploading your file.";
    }
}else{
  $query = "update detaildokacuan set  idkategori='$idkategori', tgldokacuan='$tgldokacuan', tgldokacuand='$tgldokacuand', haldokacuan='$haldokacuan',pemegangdokacuan='$pemegangdokacuan',ketdokacuan='$ketdokacuan' where idacuan='$idacuan'";
  // $query = "update detaildokacuan set  tgldokacuan='$tgldokacuan', haldokacuan='$haldokacuan',pemegangdokacuan='$pemegangdokacuan',ketdokacuan='$ketdokacuan', idkategori='$idkategori' where nodokacuan='$id'";
}
//update data ke database
    
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
      if($idkewajiban=='kosong'){
        $check=0;
      }else{
        $check=1;
      }
      // echo "<br>$idperuntukan - $check";
      if($check>0)
      {
        $sisaLuas=$_POST['luas'][$key]-$_POST['pelunasan'][$key];
        $sql = "update kewajiban set deskripsi='{$_POST['deskripsi'][$key]}',jenisfasos='{$_POST['jenisfasos'][$key]}',luas='{$sisaLuas}' where idkewajiban='$idkewajiban';";  
        $msg="Ubah Data Kewajiban(Adendum): $idkewajiban ($nodokacuan2)";
      }else{
        if($_POST['deskripsi'][$key]!='')
        {
         $sql = "INSERT INTO `kewajiban` (`idkewajiban`, `idacuan`, `nodokacuan`, `deskripsi`, `jenisfasos`, `luas`, `pelunasan`) VALUES ('', '{$_POST['idacuan']}', '{$nodokacuan2}', '{$_POST['deskripsi'][$key]}', '{$_POST['jenisfasos'][$key]}', '{$_POST['luas'][$key]}', '0');";
         $msg="Tambah Data Kewajiban baru(Adendum): {$_POST['deskripsi'][$key]} ($nodokacuan2)";
       }else{
        $sql="FAIL";
       }
      }

      if($sql=mysql_query($sql))
      {
        tracking($msg);
      }
   // echo $sql."- >   $msg<br>"; 
    } 
  }
  // echo 'Data telah disimpan';  
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
 <script type="text/javascript">
  $( function() {
      $( "#tgldokacuan" ).datepicker();
    } );
 </script>
<article class="col-sm-12 col-md-12 col-lg-12">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Detail Acuan</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding" >
        <!-- style="height: 360px;" > -->
        <fieldset>
         <form name="editdokumenacuan" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <section class="col col-sm-12 col-md-12 col-lg-6">
              <?php 
               include "koneksi.php";
               $id = $_GET['idacuan'];

               $query = mysql_query("select detaildokacuan.idacuan, detaildokacuan.nodokacuan, detaildokacuan.idkategori, detaildokacuan.tgldokacuan, detaildokacuan.pemegangdokacuan, detaildokacuan.haldokacuan, detaildokacuan.ketdokacuan, dokumenacuan.jenisdokumen from detaildokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori where idacuan='$id'") or die(mysql_error());

               $data = mysql_fetch_array($query);
               $idacuan=$data['idacuan'];
               $nodokacuan=$data['nodokacuan'];
               $jenisdokumen=$data['jenisdokumen'];
               $tgldokacuan=$data['tgldokacuan'];
               $pemegangdokacuan=$data['pemegangdokacuan'];
               $perihal=$data['haldokacuan'];
               $ketdokacuan=$data['ketdokacuan'];
               ?>

                 <input type="hidden" name="idacuan" value="<?php echo $data[idacuan]; ?>" />
                 <center>
                 <table>
                 <tr>
                   <td colspan="2">
                    <h2>Data Acuan</h2><br>
                   </td>
                 </tr>
                 <tr>
                   <td >No.Dokumen </td>           
                   <td height="21">
                    <label class='input'><input type="text" name="nodokacuan" maxlength="20" required="required" value="<?php echo $data[nodokacuan]; ?>" readonly /></label>
                    </td>
                 </tr>

                  <tr>
                   <td >Jenis Dokumen Acuan </td>           
                   <td height="21">
                   <?php
                    echo"
                      <select class='btn btn-sm btn-default' name='idkategori'>
                        <option value='$data[idkategori]'>$data[jenisdokumen]</option>
                        ";
                        $queryJenis=mysql_query("select * from dokumenacuan");
                        while ($dataJenis=mysql_fetch_array($queryJenis)) 
                        {
                          echo "
                            <option value='$dataJenis[idkategori]'>$dataJenis[jenisdokumen]</option>
                          ";
                        }
                        echo"
                      </select>
                    ";
                   ?>
                    </td>
                 </tr>

                 <tr>
                  <td>Tgl. Dokumen </td>
                  <td height="21">
                    <label class='input'><input type="text" id="tgldokacuan" name="tgldokacuan" maxlength="10" required="required" value="<?php echo $data['tgldokacuan']; ?>"/></label>
                  </td>         
                </tr>
                <td>Pemegang Dokumen </td>
                <td>
                  <label class='input'><input type="text" name="pemegangdokacuan" maxlength="40" required="required" value="<?php echo $data['pemegangdokacuan']; ?>"/></label>
                  </td>
              </tr>

              <tr>
                <td>Perihal</td>
                <td>
                <label class='input'><input type="text" name=haldokacuan value="<?=$data['haldokacuan'] ?>" ></label>
                <!-- <textarea name=haldokacuan rows=1 cols=30 required="required"/><?=$data['haldokacuan'] ?> </textarea> -->
                </td> 
              </tr> 


              <tr>
                <td>Keterangan</td>
                <td>
                <label class='input'><input type="text" name=ketdokacuan value="<?=$data['ketdokacuan'] ?>" ></label>
                </td> 
              </tr>  
              <tr>

                <tr>
                  <td>File Acuan</td>
                  <td align="right">
                    <input type="file" name="fileacuan" class="btn btn-sm btn-default">
                  </td> 
                </tr>  
              </table>
              </center>
            <!-- </form> -->
            </section>
            
            <section class="col col-sm-12 col-md-12 col-lg-6">
              <!-- <form name="inputlokasiaset" action="" method="post"> -->
                <!-- No.Dokumen Acuan :   -->
                <h2>Data Kewajiban</h2>
                  <input type="hidden" name="nodokacuan2" value="<?php echo $data[nodokacuan]; ?>" readonly/> 
                  <input type="hidden" name="idacuan" value="<?php echo $data['idacuan'];?>">

                  <br><p>
                  <div style=" width:20; overflow:auto;">
                    <!-- height:150px; -->
                    <table class="table table-striped table-hover" id=datatable >
                        <tr>
                          <td class="center"><b>Deskripsi</b></td>
                          <td class="center"><b>Jenis Fasos Fasum</b></td>
                          <td class="center"><b>Luas / Jumlah</b></td>
                          <td class="center"><b>Act.</b></td>
                        </tr>

                        <?php
                        $row=1;
                        $query0="select idkewajiban, deskripsi, jenisfasos, luas, pelunasan from kewajiban where nodokacuan='$data[nodokacuan]' and status='0'";
                        // echo "$query0";
                        // echo mysql_num_rows(mysql_query("select * from kewajiban where luas='0' and pelunasan='0'"))."<<- nol";
                        $query0=mysql_query($query0);
                        while ($d0=mysql_fetch_array($query0)) {
                          $row++;
                          $luas=$d0['luas']+$d0['pelunasan'];
                          echo"
                          <tr>
                            <td>
                              <input type='hidden' name='idkewajiban[]' value='$d0[idkewajiban]'>
                              <label class='input'><input type='text' name='deskripsi[]' value='$d0[deskripsi]'></label>
                            </td>
                            <td><center><select name='jenisfasos[]' class='btn btn-sm btn-default'>
                              <option value='$d0[jenisfasos]'>$d0[jenisfasos]</option>
                              ";
                              $query = "SELECT * FROM ref_jenisfasosfasum";
                              $hasil = mysql_query($query);
                              while ($data = mysql_fetch_array($hasil))
                              {
                                echo "<option >".$data['display']."</option>".$data['display']."</option>";
                              }
                              echo"
                            </select></center></td>

                            <td>
                              <label class='input'>
                                <input type='number' name='luas[]' value='$luas'>
                                </label>
                            </td>  
                            <td><a href='index.php?hal=editacuan&nodokacuan=$id&delete=$d0[idkewajiban]' ";?>onclick="return confirm('Are you sure?')">hapus</a></td>
                          </tr>
                        <?php
                        }
                        ?>
                    </table>
                  </div>
                  <br>
                  <input type=button name=tambah1 value=Tambah onclick=tambah() class="btn btn-sm btn-info">
                  <input type=button name=delete1 value=Delete onclick=hapus() class="btn btn-sm btn-default">
                  <script>
                    var idrow = <?php echo $row; ?>;

                    function tambah(){
                      var x=document.getElementById('datatable').insertRow(idrow);
                      var td1=x.insertCell(0);
                      var td2=x.insertCell(1);
                      var td3=x.insertCell(2);

                      td1.innerHTML="<label class='input'><input type='text' name='deskripsi[]'><input type='hidden' name='idkewajiban[]' value='kosong'></label>";
                      td2.innerHTML="<center><select name='jenisfasos[]' class='btn btn-sm btn-default'>           <?php
                      include "koneksi.php";
                      $query = "SELECT * FROM ref_jenisfasosfasum";
                      $hasil = mysql_query($query);
                      while ($data = mysql_fetch_array($hasil))
                      {
                        echo "<option >".$data['display']."</option>".$data['display']."</option>";
                      }
                      ?></select></center>";

                      td3.innerHTML="<label class='input'><input type='number' name='luas[]'></label>";

                      idrow++;
                    }

                    function hapus(){
                     if(idrow><?php echo $row; ?>){
                       var x=document.getElementById('datatable').deleteRow(idrow-1);
                       idrow--;
                     }
                   }
                 </script>
             </div>
              <center>
                  <input type="submit" name="submit" value="Simpan Data Adendum"  class="btn btn-lg btn-info"> 
              </center> 
          </div>
           </form>
        </fieldset>
      </div>
    </div>
    <!-- end widget div -->

  </div>
  <!-- end widget -->

</article>
<!-- WIDGET END -->

<?php
  $count="select count(nodokacuan) as count from detaildokacuan where nodokacuan='$nodokacuan'";
  // echo "$count";
  $count=mysql_query($count);
  $count=mysql_fetch_array($count);
  if($count['count']>1)
  {
    ?>
  <article class="col-sm-12 col-md-12 col-lg-12">
  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-6" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Data Adendum</h2>
  </header>
    <!-- widget div-->
    <div class="smart-form">
      <div class="widget-body no-padding">
        <fieldset>
          <form name="inputdetaildokumenacuan" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <table class="table table-responsive table-striped">
                <tr>
                  <td><b>No.</b></td>
                  <td><b>Jenis Acuan</b></td>
                  <td><b>Tgl. Acuan</b></td>
                  <td><b>Pemegang Acuan</b></td>
                  <td><b>Perihal</b></td>
                  <td><b>Keterangan</b></td>
                  <td><b>File Acuan</b></td>
                  <td><b>Versi</b></td>
                </tr>
              <?php
                $no=0;
                $selectAdendum="select * from detaildokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori where nodokacuan='$nodokacuan' and versi>0 order by versi ASC";
                // echo "$selectAdendum";
                $selectAdendum=mysql_query($selectAdendum);
                // echo mysql_num_rows($selectAdendum);
                while ($dselectAdendum=mysql_fetch_array($selectAdendum)) 
                {
                  $no++;
                  if($dselectAdendum['versi']=='1')
                  {
                    $versi="Asli";
                  }else{
                    $versi="Adendum ke-".($dselectAdendum['versi']-1);
                  }
                  $qr="select nama_asli,nama_file,path from upload where idacuan='$dselectAdendum[idacuan]'";
                  $qp=mysql_query($qr);
                  $dq=mysql_fetch_array($qp);
                  echo "
                    <tr>
                      <td>$no</td>
                      <td>$dselectAdendum[jenisdokumen]</td>
                      <td>$dselectAdendum[tgldokacuan]</td>
                      <td>$dselectAdendum[pemegangdokacuan]</td>
                      <td>$dselectAdendum[haldokacuan]</td>
                      <td>$dselectAdendum[ketdokacuan]</td>
                      <td><a href='download.php?type=a&id=$dselectAdendum[idacuan]' target='_blank'>$dq[nama_asli]</a></td>
                      <td>$versi</td>
                    </tr>
                  ";
                }
                $no++;
                $qr="select nama_asli,nama_file,path from upload where idacuan='$idacuan'";
                $qp=mysql_query($qr);
                $dq=mysql_fetch_array($qp);
                echo "
                  <tr>
                    <td>$no</td>
                    <td>$jenisdokumen</td>
                    <td>$tgldokacuan</td>
                    <td>$pemegangdokacuan</td>
                    <td>$perihal</td>
                    <td>$ketdokacuan</td>
                    <td><a href='download.php?type=a&id=$idacuan' target='_blank'>$dq[nama_asli]</a></td>
                    <td>Adendum Akhir</td>
                  </tr>
                ";
              ?>
              </table>
            </section>
          </div>
                  </form>
        </fieldset>
      </div>
    </div>
    <!-- end widget div -->

  </div>
  <!-- end widget -->

</article>
<!-- WIDGET END --> 
    <?php
  }
?>