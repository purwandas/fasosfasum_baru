<?php
  $wilayah=$_SESSION['SESS_WILAYAH'];
?>
<script>
   var idrow = 2;

   function tambah(){
     var x=document.getElementById('datatable').insertRow(idrow);
     var td1=x.insertCell(0);
     var td2=x.insertCell(1);
     var td3=x.insertCell(2);
     var td4=x.insertCell(3);
     var td5=x.insertCell(4);
     var td6=x.insertCell(5);

     


     
     td1.innerHTML="<label class='input'><input type='text' required name='alamataset[]'></label>";
     td2.innerHTML="<select name='wilayah[]' class='btn btn-sm btn-default'>            <?php
    include "koneksi.php";
     // query untuk menampilkanwilayah
    $query = "SELECT * FROM wilayah where wilayah='$wilayah'";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
      echo "<option value='".$data['wilayah']."'>".$data['wilayah']."</option>";
    }
    ?></select>";

    td3.innerHTML="<select name='kecamatan[]' class='btn btn-sm btn-default'>           <?php
     include "koneksi.php";
     // query untuk menampilkan kecamatan
     $query = "SELECT * FROM kecamatan where wilayah='$wilayah'";
     $hasil = mysql_query($query);
     while ($data = mysql_fetch_array($hasil))
     {
      echo "<option value='".$data['namakecamatan']."'>".$data['namakecamatan']."</option>";
    }
    ?></select>";

    td4.innerHTML="<select name='kelurahan[]' class='btn btn-sm btn-default'>            <?php
    include "koneksi.php";
     // query untuk menampilkankelurahan
    $query = "SELECT * FROM kelurahan where wilayah='$wilayah'";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
      echo "<option value='".$data['namakelurahan']."'>".$data['namakelurahan']."</option>";
    }
    ?></select>";

    td5.innerHTML="<label class='input'><input type='text' name='latitude[]'></label>";

    td6.innerHTML="<label class='input'><input type='text' name='longitude[]'></label>";


    idrow++;
  }


  function hapus(){
   if(idrow>2){
     var x=document.getElementById('datatable').deleteRow(idrow-1);
     idrow--;
   }
 }

  $( function() {
    $( "#tglbast" ).datepicker();
  } );

</script>
<script>
  
  </script>

<article class="col-sm-12 col-md-12 col-lg-12">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Tambah Data BAST</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding">
        <fieldset>
          <div class="row">
            <form name="inputbast" action="index.php?hal=peruntukan" method="post"  enctype="multipart/form-data">
          
            <section class="col col-sm-12 col-md-12 col-lg-6">
              
              <h1>Deskripsi BAST</h1>
              <br>
              <!-- <form name="inputbast" action="" method="post"  enctype="multipart/form-data"> -->
               <table>
                <tr>
                  <td>No.BAST </td>
                  <td>: </td>
                  <td><label class='input'>
                    <input type="text" name="nobast" maxlength="50" required="required" />
                  </label></td>
                </tr>
                <tr><td>Tgl. BAST </td>
                <td>: </td>
                <td><label class='input'><input type="text" id="tglbast" name="tglbast" maxlength="10" required="required"/></label></td>
                </tr>
                <tr>
                  <td>Pengembang </td>
                  <td>: </td>
                  <td><label class='input'><input type="text" name="pengembangbast" maxlength="100" required="required" /></label></td>
                </tr>
                <tr>
                  <td>Perihal</td>
                  <td>:</td>
                  <td><label class='input'><input type="text" name=perihalbast /></label></td> 
                </tr>
                <tr>
                  <td>Kategori </td>
                  <td>:</td>
                  <td>
                    <select  name=keterangan  class="btn btn-default btn-sm">
                        <?php
                          echo"
                            <option value=''>
                            -pilih-
                            </option>
                          ";
                          $qKeterangan="select* from ref_penandatangananbast";
                          $qKeterangan=mysql_query($qKeterangan);
                          while ($dKet=mysql_fetch_array($qKeterangan))
                          {
                            echo"
                              <option value='$dKet[display]'>
                              $dKet[display]
                              </option>
                            ";
                          }
                        ?>
                    </select>
                  </td> 
                </tr>
                <tr><td>Dokumen Acuan</td>
                <td>:</td>
                <td><select name='nodokacuan' class="select2">
                 <?php
                 // include "koneksi.php";
                 // query untuk menampilkan wilayah
                 $query = "SELECT idacuan, nodokacuan FROM detaildokacuan where versi='0'";
                 $hasil = mysql_query($query);
                 while ($data = mysql_fetch_array($hasil))
                 {
                  echo "<option value='".$data['idacuan']."'>".$data['nodokacuan']."</option>";
                }
                ?>
              </select></td>
              </tr>       

              <!-- <tr>
              <td>Kode Arsip </td><td>: </td><td><label class='input'><input type="text" name="kodearsip" maxlength="40" required="required" /></label></td>
              </tr> -->
              <tr>
               <td>File Acuan</td><td>: </td><td><input type="file" name="fileacuan" class='btn btn-sm btn-default'></td>
              </tr>
            </table>
            </section>
            <!-- 
            <section class="col col-sm-12 col-md-12 col-lg-6">
              <h1>Lokasi Dokumen BAST</h1><br>
     
             <table border="0">
              
               <tr>
               <td><input type="checkbox" name="rekon163" value="1"/>Data Rekon 163<br/></td>
                 <td><input type="checkbox" name="rekon54" value="1" /> Data Rekon 54<br/></td>
                 </tr>
               <tr>
               <td><input type="checkbox" name="rekon101" value="1" /> Data Rekon 101<br/></td>
                 <td><input type="checkbox" name="rekon129" value="1" /> Data Rekon 129<br/></td>
                 </tr>
               <tr>
               <td><input type="checkbox" name="pulomas" value="1" /> Data Pulo Mas<br/></td>
                 <td><input type="checkbox" name="balaikota" value="1" /> Data Balai Kota Lt.7 <br/></td>
                 </tr>
               <tr>
               <td><input type="checkbox" name="tp3w" value="1" /> Data TP3W <br/></td>
                 <td><input type="checkbox" name="lokasi58" value="1" /> Data 58<br/></td>
                 </tr>
               <tr>
               <td><input type="checkbox" name="dtr" value="1" /> Data DTR <br>  </td>
                 <td><input type="checkbox" name="bpk357" value="1" /> Data LK2010 <br/></td>
                 </tr>
                 <tr>
                 <td  colspan='2'><input type="checkbox" name="mutasi" value="1" /> Data Mutasi<br/></td>
                 </tr>
               
             </table>
             
            </section> -->
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <!-- <form name="inputlokasiaset" action="" method="post"> -->
           <!-- No.BAST :  <input type="text" name="nobast" value="<?php if(isset($nobastlokasi)){echo $nobastlokasi;} ?>"/>  -->
              <h1>Lokasi ASET</h1><br>
           
             <div style="overflow:auto;">

               <table class="table table-bordered table-striped" id=datatable >
                   <tr>
                     <td>ALAMAT ASET</td>
                     <td>WILAYAH</td>
                     <td>KECAMATAN</td>
                     <td>KELURAHAN</td>
                     <td>LATITUDE</td>
                     <td>LONGITUDE</td>
                   </tr>

                   <tr>

                     <td><label class='input'><input type='text' required name='alamataset[]'></label></td>

                     <td><select name='wilayah[]' class='btn btn-sm btn-default'>

                     <?php
                     
                   // query untuk menampilkan wilayah
                     $query = "SELECT * FROM wilayah where wilayah='$wilayah'";
                     $hasil = mysql_query($query);
                     while ($data = mysql_fetch_array($hasil))
                     {
                      echo "<option value='".$data['wilayah']."''>".$data['wilayah']."</option>";
                    }
                    ?>
                    </select></td>

                     <td><select name='kecamatan[]' class='btn btn-sm btn-default'>

                       <?php
                 // query untuk menampilkan kecamatan
                       $query = "SELECT * FROM kecamatan where wilayah='$wilayah'";
                       $hasil = mysql_query($query);
                       while ($data = mysql_fetch_array($hasil))
                       {
                        echo "<option value='".$data['namakecamatan']."'>".$data['namakecamatan']."</option>";
                      }
                      ?>
                    </select></td>

                    <td><select name='kelurahan[]' class='btn btn-sm btn-default'>

                     <?php
                 // query untuk menampilkan kelurahan
                     $query = "SELECT * FROM kelurahan where wilayah='$wilayah'";
                     $hasil = mysql_query($query);
                     while ($data = mysql_fetch_array($hasil))
                     {
                      echo "<option value='".$data['namakelurahan']."'>".$data['namakelurahan']."</option>";
                    }
                    ?>
                  </select></td>

                  
                <td><label class='input'><input type='text' name='latitude[]'></label></td>
                <td><label class='input'><input type='text' name='longitude[]'></label></td>

              </tr>
          </table>
        </div>
        <br>
        <input type=button  class='btn btn-sm btn-info' name=tambah1 value=Tambah onclick=tambah()>
        <input type=button  class='btn btn-sm btn-default' name=delete1 value=Delete onclick=hapus()>        

    </div>
    <center><input type="submit" class='btn btn-lg btn-info' name="submit" value="Simpan Data BAST"/></center>
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
