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
         <form name="editdokumenacuan" action="adendump.php" method="post" enctype="multipart/form-data">
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
                $selectAdendum="select * from detaildokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori where nodokacuan='$nodokacuan' order by versi ASC";
                // echo "$selectAdendum";
                $selectAdendum=mysql_query($selectAdendum);
                // echo mysql_num_rows($selectAdendum);
                while ($dselectAdendum=mysql_fetch_array($selectAdendum)) 
                {
                  $no++;
                  if($dselectAdendum['versi']=='0')
                  {
                    $versi="Asli";
                  }else{
                    $versi="Adendum ke-".($dselectAdendum['versi']);
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