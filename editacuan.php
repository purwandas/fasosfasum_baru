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
    // $jenisacuan=$_POST['jenisacuan'];
    $idkategori=$_POST['idkategori'];

    $id=$_GET['nodokacuan'];

    $tgldokacuan= $_POST['tgldokacuan'];
    $cekTgl=mysql_query("select tgldokacuan from detaildokacuan where nodokacuan='$id' and versi='0'");
    $cekTgl=mysql_fetch_array($cekTgl);
    if($cekTgl['tgldokacuan']!=$tgldokacuan)
    {
      $tgldokacuand=substr($tgldokacuan, -4).'-'.substr($tgldokacuan, 0,2)."-".substr($tgldokacuan, 3,2);
      $tgldokacuan=substr($tgldokacuan, 3,2).'/'.substr($tgldokacuan, 0,2).substr($tgldokacuan, -5);
    }else{
      $tgldokacuand=substr($tgldokacuan,-4).'-'.substr($tgldokacuan, 3,2).'-'.substr($tgldokacuan, 0,2);
    }
    
    $haldokacuan= $_POST['haldokacuan'];
    $pemegangdokacuan= $_POST['pemegangdokacuan'];
    $ketdokacuan= $_POST['ketdokacuan'];
    $idacuan=$_POST['idacuan'];

    // $qKategoriAcuan=mysql_query("select * from dokumenacuan where jenisdokumen='$jenisacuan'");
    // $dKategoriAcuan=mysql_fetch_array($qKategoriAcuan);

if($_FILES["fileacuan"]["tmp_name"]!='')
{
    if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) 
    {
      $namafile=$_FILES['fileacuan']['name'];
      if($idacuan!=''){
        $dupload=mysql_query("delete from upload where idacuan='$idacuan'");
      }
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
    
    // echo "$query";

    if ($query=mysql_query($query)) {
      tracking("Ubah Dok. Acuan: $id");
     // echo 'simpan perbahan dokumen acuan berhasil...........';
    }
} 
//------------------------------------------------------------------------------

//simpan data kewajiban
 if (isset($_POST['submit2'])){
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
        $msg="Ubah Data Kewajiban: $idkewajiban ($nodokacuan2)";
      }else{
        // $sql = "insert into kewajiban
        // (idperuntukan,deskripsi,jenisfasos,luas,statussertifikat,statusplang,statuspenggunaan,sensusfasos,nodokacuan)   
        //      values 
        //      ('','{$_POST['deskripsi'][$key]}','{$_POST['jenisfasos'][$key]}','{$_POST['luas'][$key]}','Belum SHP Pemprov. DKI Jakarta','Belum Terpasang','Idle','Belum dilakukan Sensus','$nodokacuan2');";
        if($_POST['deskripsi'][$key]!='')
        {
         $sql = "INSERT INTO `kewajiban` (`idkewajiban`, `idacuan`, `nodokacuan`, `deskripsi`, `jenisfasos`, `luas`, `pelunasan`) VALUES ('', '{$_POST['idacuan']}', '{$nodokacuan2}', '{$_POST['deskripsi'][$key]}', '{$_POST['jenisfasos'][$key]}', '{$_POST['luas'][$key]}', '0');";
         $msg="Tambah Data Kewajiban baru: {$_POST['deskripsi'][$key]} ($nodokacuan2)";
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
<article class="col-sm-12 col-md-12 col-lg-6">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Detail Acuan</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding"   style="height: 360px;" >
        <fieldset>
          <div class="row">
          
              
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <?php 
               include "koneksi.php";
               $id = $_GET['nodokacuan'];

               $query = mysql_query("select idacuan, nodokacuan, idkategori, tgldokacuan, pemegangdokacuan, haldokacuan, ketdokacuan from detaildokacuan where nodokacuan='$id' and versi='0'") or die(mysql_error());

               $data = mysql_fetch_array($query);
               ?>

               <form name="editdokumenacuan" action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="id" value="<?php echo $id; ?>" />
                 <input type="hidden" name="idacuan" value="<?php echo $data['idacuan'];?>">
                 <center>
                 <table>

                 <tr>
                   <td >No.Dokumen </td>           
                   <td height="21">
                    <label class='input'><input type="text" name="nodokacuan" maxlength="20" required="required" value="<?php echo $id; ?>" readonly /></label>
                    </td>
                 </tr>

                  <tr>
                   <td >Jenis Dokumen Acuan </td>           
                   <td height="21">
                   <?php
                    $qJenisAcuan=mysql_query("select * from dokumenacuan where idkategori='$data[idkategori]'");
                    $dJenisAcuan=mysql_fetch_array($qJenisAcuan);
                    echo"
                      <select class='btn btn-sm btn-default' name='idkategori'>
                        <option value='$dJenisAcuan[idkategori]'>$dJenisAcuan[jenisdokumen]</option>
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
                    <?php 
                    $qr="select nama_asli,nama_file,path from upload where idacuan='$data[idacuan]'";
                    $qp=mysql_query($qr);
                    while ($dq=mysql_fetch_array($qp)) {
                      echo"
                      <a href='download.php?type=a&id=$data[idacuan]' target='_blank'>$dq[nama_asli]</a><br>
                      ";
                    }
                    ?>
                    
                    <input type="file" name="fileacuan" class="btn btn-sm btn-default">
                  </td> 
                </tr>  
                <tr>



                  <td align="center" colspan="2"> <br>
                  <input type="submit" name="submit" value="Simpan Perubahan"  class="btn btn-lg btn-info"> 
                  </td>
                </tr>

              </table>
              </center>
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

<article class="col-sm-12 col-md-12 col-lg-6">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Detail Kewajiban</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding" >
       <!-- style="height: 360px;" > -->
        <fieldset>
          <div class="row">
          
              
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <form name="inputlokasiaset" action="" method="post">
                No.Dokumen Acuan :  
                <label class='input'>
                  <input type="text" name="nodokacuan2" value="<?php echo $id; ?>" readonly/> 
                  <input type="hidden" name="idacuan" value="<?php echo $data['idacuan'];?>">
                </label>

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
                        $query0="select idkewajiban, deskripsi, jenisfasos, luas, pelunasan from kewajiban where nodokacuan='$id' and status='0'";
                        // echo "$query0";
                        $query0=mysql_query($query0);
                        while ($d0=mysql_fetch_array($query0)) {
                          $row++;
                          $luas=$d0['luas']+$d0['pelunasan'];
                          echo"
                          <tr>
                            <td>
                              <input type='hidden' name='idkewajiban[]' value='$d0[idkewajiban]'>
                              <input type='hidden' name='pelunasan[]' value='$d0[pelunasan]'>
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
                  <center><input type="submit" name="submit2" value="Simpan Data Kewajiban"  class="btn btn-lg btn-info"/></center>
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