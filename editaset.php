  <script type="text/javascript">
    $(function(){
      $("#wilayah").change(function(){
        $("#kecamatan").empty();
        $("#kelurahan").empty();
        $("#kecamatan").append("<option value='' > Kecamatan </option>");
        $("#kelurahan").append("<option value='' > Kelurahan </option>");
        var wilayah=$(this).val(); 
        $.get('wilayah.php',{'nama':wilayah}, function(data){
          $.each(data,function(k,v){
            $("#kecamatan").append("<option value='" + v + "' > "+v+"</option>");
          });
        }, "json");
      });
      $("#kecamatan").change(function(){
        $("#kelurahan").empty();
        $("#kelurahan").append("<option value='' > Kelurahan </option>");
        var kecamatan=$(this).val(); 
        $.get('wilayah2.php',{'kec':kecamatan}, function(data){
          $.each(data,function(k,v){
            $("#kelurahan").append("<option value='" + v + "' > "+v+"</option>");
          });
        }, "json");
      });
    });
  </script>
  <?php
  if (isset($_POST['submitaset'])){

    $id=$_POST['id'];
    $alamat= $_POST['alamat'];
    $wilayah= $_POST['wilayah'];
    $kecamatan= $_POST['kecamatan'];
    $kelurahan= $_POST['kelurahan'];
    $latitude= $_POST['latitude'];
    $longitude= $_POST['longitude'];

    $query = mysql_query("update dataaset set  alamataset='$alamat', wilayah='$wilayah',kecamatan='$kecamatan',kelurahan='$kelurahan',latitude='$latitude',longitude='$longitude' where idaset='$id'") or die(mysql_error());
//update data ke database

    if ($query) {

     echo 'simpan perbahan data aset berhasil...........';

   }
 }
 ?>
<article class="col-sm-12 col-md-12 col-lg-6">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Data Aset</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding">
        <fieldset>
          <div class="row">
          
              
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <?php 
               $id = $_GET['id'];
               $query = mysql_query("select * from dataaset where idaset='$id'") or die(mysql_error());

               $data = mysql_fetch_array($query);
               ?>

               <form name="editbast" action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="id" value="<?php echo $id; ?>" />
                 <center>
                 <table>

                  <tr>
                    <td >ID Aset</td>           
                    <td height="21"><label class='input'><input type="text" name="id" maxlength="20" required="required" value="<?php echo $data['idaset']; ?>" disabled /></label>
                    </td>
                  </tr>

                  <tr>
                    <td>Alamat Aset </td>
                    <td height="21"><label class='input'><input type="text" id="alamat" name="alamat" required="required" value="<?php echo $data['alamataset']; ?>"/></label>
                    </td>         
                  </tr>
                  <tr>
                    <td>Wilayah </td>
                    <td>
                      <select name='wilayah' id='wilayah' class="btn btn-sm btn-default">
                        <?php
                        echo "<option >".$data['wilayah']."</option>".$data['wilayah']."</option>";
                        $queryWilayah = "SELECT * FROM wilayah";
                        $hasilWilayah = mysql_query($queryWilayah);
                        while ($dataWilayah = mysql_fetch_array($hasilWilayah))
                        {
                          echo "<option >".$dataWilayah['wilayah']."</option>".$dataWilayah['wilayah']."</option>";
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td>
                      <select name='kecamatan' id='kecamatan' class="btn btn-sm btn-default">
                        <?php
                        echo "<option >".$data['kecamatan']."</option>".$data['kecamatan']."</option>";
                        $queryKecamatan = "SELECT * FROM kecamatan";
                        $hasilKecamatan = mysql_query($queryKecamatan);
                        while ($dataKecamatan = mysql_fetch_array($hasilKecamatan))
                        {
                          echo "<option >".$dataKecamatan['namakecamatan']."</option>".$dataKecamatan['namakecamatan']."</option>";
                        }
                        ?>
                      </select>
                    </td> 
                  </tr> 


                  <tr>
                    <td>Kelurahan</td>
                    <td>
                      <select name='kelurahan' id='kelurahan' class="btn btn-sm btn-default">
                        <?php
                        echo "<option >".$data['kelurahan']."</option>".$data['kelurahan']."</option>";
                        $queryKelurahan = "SELECT * FROM kelurahan";
                        $hasilKelurahan = mysql_query($queryKelurahan);
                        while ($dataKelurahan = mysql_fetch_array($hasilKelurahan))
                        {
                          echo "<option >".$dataKelurahan['namakelurahan']."</option>".$dataKelurahan['namakelurahan']."</option>";
                        }
                        ?>
                      </select>
                    </td> 
                  </tr>  
                  <tr>
                    <td>Latitude </td>
                    <td><label class='input'><input type="text" name="latitude" maxlength="40" required="required" value="<?php echo $data['latitude']; ?>"/></label>
                    </td>
                  </tr>

                  <tr>
                    <td>Longitude</td>
                    <td><label class='input'><input type="text" name="longitude" maxlength="40" required="required" value="<?php echo $data['longitude']; ?>"/></label>
                    </td>
                  </tr>
                  
                  <tr>
                    <td align="center" colspan="2"><input type="submit" name="submitaset" value="Simpan Perubahan" class="btn btn-lg btn-info"> </td>
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