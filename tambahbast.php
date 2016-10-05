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

     


     
     td1.innerHTML="<input type='text' required name='alamataset[]'>";
     td2.innerHTML="<select name='kecamatan[]'>           <?php
     include "koneksi.php";
     // query untuk menampilkan kecamatan
     $query = "SELECT * FROM kecamatan";
     $hasil = mysql_query($query);
     while ($data = mysql_fetch_array($hasil))
     {
      echo "<option >".$data['namakecamatan']."</option>".$data['namakecamatan']."</option>";
    }
    ?></select>";

    td3.innerHTML="<select name='kelurahan[]'>            <?php
    include "koneksi.php";
     // query untuk menampilkankelurahan
    $query = "SELECT * FROM kelurahan";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
      echo "<option >".$data['namakelurahan']."</option>".$data['namakelurahan']."</option>";
    }
    ?></select>";

    td4.innerHTML="<select name='wilayah[]'>            <?php
    include "koneksi.php";
     // query untuk menampilkanwilayah
    $query = "SELECT * FROM wilayah";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
      echo "<option >".$data['wilayah']."</option>".$data['wilayah']."</option>";
    }
    ?></select>";

    td5.innerHTML="<input type='text' required name='latitude[]'>";

    td6.innerHTML="<input type='text' required name='longitude[]'>";


    idrow++;
  }


  function hapus(){
   if(idrow>2){
     var x=document.getElementById('datatable').deleteRow(idrow-1);
     idrow--;
   }
 }

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
                  <td><input type="text" name="nobast" maxlength="50" required="required" /></td>
                </tr>
                <tr><td>Tgl. BAST </td>
                <td>: </td>
                <td><input type="text" id="tgldokacuan" name="tglbast" maxlength="10" required="required"/></td>
                </tr>
                <tr>
                  <td>Pengembang </td>
                  <td>: </td>
                  <td><input type="text" name="pengembangbast" maxlength="100" required="required" /></td>
                </tr>
                <tr>
                  <td>Perihal</td>
                  <td>:</td>
                  <td><textarea name=perihalbast rows=1 cols=30 required="required" /> </textarea></td> 
                </tr>
                <tr>
                  <td>Kategori </td>
                  <td>:</td>
                  <td><textarea name=keterangan rows=1 cols=30 required="required" /> </textarea></td> 
                </tr>
                <tr><td>Dokumen Acuan</td>
                <td>:</td>
                <td><select name='nodokacuan'>
                 <?php
                 include "koneksi.php";
                 // query untuk menampilkan wilayah
                 $query = "SELECT * FROM detaildokacuan";
                 $hasil = mysql_query($query);
                 while ($data = mysql_fetch_array($hasil))
                 {
                  echo "<option >".$data['nodokacuan']."</option>".$data['nodokacuan']."</option>";
                }
                ?>
              </select></td>
              </tr>       

              <tr>
              <td>Kode Arsip </td><td>: </td><td><input type="text" name="kodearsip" maxlength="40" required="required" /></td>
              </tr>
              <tr>
               <td>File Acuan</td><td>: </td><td><input type="file" name="fileacuan"></td>
              </tr>
            </table>
            <!-- <right><input type="submit" name="submit" value="Simpan Data BAST"/></right> -->
          <!-- </form> -->

            </section>
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
               <!-- <tr>
               <td align="right" colspan="2"><input type="submit" value="Simpan Perubahan" name="submit22"></td>
               </tr> -->
             </table>
             
           <!-- </form>  -->

            </section>
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <!-- <form name="inputlokasiaset" action="" method="post"> -->
           <!-- No.BAST :  <input type="text" name="nobast" value="<?php if(isset($nobastlokasi)){echo $nobastlokasi;} ?>"/>  -->
              <h1>Lokasi ASET</h1><br>
           
             <div style="overflow:auto;">

               <table class="table table-bordered table-striped" id=datatable >
                   <tr>
                     <td class="center">ALAMAT ASET</td>
                     <td class="center">KECAMATAN</td>
                     <td class="center">KELURAHAN</td>
                     <td class="center">WILAYAH</td>
                     <td class="center">LATITUDE</td>
                     <td class="center">LONGITUDE</td>
                   </tr>

                   <tr>

                     <td><input type='text' required name='alamataset[]'></td>
                     <td><select name='kecamatan[]'>

                       <?php
                 // query untuk menampilkan wilayah
                       $query = "SELECT * FROM kecamatan";
                       $hasil = mysql_query($query);
                       while ($data = mysql_fetch_array($hasil))
                       {
                        echo "<option >".$data['namakecamatan']."</option>".$data['namakecamatan']."</option>";
                      }
                      ?>
                    </select></td>

                    <td><select name='kelurahan[]'>

                     <?php
                 // query untuk menampilkan kelurahan
                     $query = "SELECT * FROM kelurahan";
                     $hasil = mysql_query($query);
                     while ($data = mysql_fetch_array($hasil))
                     {
                      echo "<option >".$data['namakelurahan']."</option>".$data['namakelurahan']."</option>";
                    }
                    ?>
                  </select></td>

                  <td><select name='wilayah[]'>

                   <?php
                 // query untuk menampilkan wilayah
                   $query = "SELECT * FROM wilayah";
                   $hasil = mysql_query($query);
                   while ($data = mysql_fetch_array($hasil))
                   {
                    echo "<option >".$data['wilayah']."</option>".$data['wilayah']."</option>";
                  }
                  ?>
                </select></td>    
                <td><input type='text' required name='latitude[]'></td>
                <td><input type='text' required name='longitude[]'></td>

              </tr>
          </table>
        </div>
        <br>
        <input type=button name=tambah1 value=Tambah onclick=tambah()><input type=button name=delete1 value=Delete onclick=hapus()>        

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
