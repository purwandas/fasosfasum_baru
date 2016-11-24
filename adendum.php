<?php
  if(isset($_POST['submit']))
  {
    if(isset($_FILES))
    include"tracking.php";
    tracking("coba track adendum");  
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
    <h2>Adendum Acuan</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding"   >
        <fieldset>
          <div class="row">
              <?php 
               include "koneksi.php";
               $id = $_GET['nodokacuan'];

               $query = mysql_query("select nodokacuan, idkategori, tgldokacuan, pemegangdokacuan, haldokacuan, ketdokacuan, max(versi) from detaildokacuan where nodokacuan='$id'") or die(mysql_error());

               $data = mysql_fetch_array($query);
               ?>
           <form name="editdokumenacuan" action="" method="post" enctype="multipart/form-data">
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <center>
                No. Dokumen Acuan :  
                <label class='input'>
                  <input type="text" name="nodokacuan" value="<?php echo $id; ?>" disabled class='text-center'> 
                </label>
              </center> 
            </section>
            <section class="col col-sm-12 col-md-12 col-lg-6">
              
                <center>
                 <table style='width:80%'>
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
                <label class='input'><input type="text" name=haldokacuan required="required" value="<?=$data['haldokacuan'] ?>" ></label>
                <!-- <textarea name=haldokacuan rows=1 cols=30 required="required"/><?=$data['haldokacuan'] ?> </textarea> -->
                </td> 
              </tr> 


              <tr>
                <td>Keterangan</td>
                <td>
                <label class='input'><input type="text" name=ketdokacuan required="required" value="<?=$data['ketdokacuan'] ?>" ></label>
                </td> 
              </tr>  
              <tr>

                <tr>
                  <td>File Acuan</td>
                  <td>
                    <?php 
                    $qr="select nama_asli,nama_file,path from upload where nodokacuan='$data[nodokacuan]'";
                    $qp=mysql_query($qr);
                    while ($dq=mysql_fetch_array($qp)) {
                      echo"
                      <a href='download.php?type=a&id=$data[nodokacuan]' target='_blank'>$dq[nama_asli]</a>
                      ";
                    }
                    ?>
                    <br>
                    <input type="file" name="fileacuan" class="btn btn-sm btn-default">
                  </td> 
                </tr>  
              </table>
              </center>
            </section>
              
            <section class="col col-sm-12 col-md-12 col-lg-6">
                <p>
                  <div style=" width:20; overflow:auto;">

                    <table class="table table-striped table-hover" id=datatable >
                        <tr>
                          <td class="center">Deskripsi</td>
                          <td class="center">Jenis Fasos Fasum</td>
                          <td class="center">Luas</td>
                          <td class="center">Act.</td>
                        </tr>

                        <?php
                        $row=1;
                        $query0=mysql_query("select idperuntukan,deskripsi, jenisfasos, luas from peruntukan where nodokacuan='$id'");
                        while ($d0=mysql_fetch_array($query0)) {
                          $row++;
                          echo"
                          <tr>
                            <td>
                              <input type='hidden' name='idperuntukan[]' value='$d0[idperuntukan]'>
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
                              <label class='input'><input type='number' name='luas[]' value='$d0[luas]'></label>
                            </td>  
                            <td><a href='index.php?hal=editacuan&nodokacuan=$id&delete=$d0[idperuntukan]' ";?>onclick="return confirm('Are you sure?')">hapus</a></td>
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

                      td1.innerHTML="<label class='input'><input type='text' name='deskripsi[]'><input type='hidden' name='idperuntukan[]' value='kosong'></label>";
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
            </section>
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <center>
                <input type="submit" name="submit" value="Simpan Data Adendum" class="btn btn-lg btn-primary">
              </center> 
            </section>
           </form>
          </div>
        </fieldset>
      </div>
    </div>
    <!-- end widget div -->

  </div>
  <!-- end widget -->

</article>
<!-- WIDGET END -->