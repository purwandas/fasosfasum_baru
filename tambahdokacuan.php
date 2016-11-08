<!-- <p class="alert alert-warning" align="right">
	<span>
    <a><img alt=" " src="img/excel.jpg" border=0></a>&nbsp;
    <a target="_blank" href="pdfdetail.php?id=<?php echo $data['nobast']; ?>">
      Print this page
    </a>
    </span>
</p> 
<P align=right><span>
        <a><img alt=" " src="view/image/excel.jpg" border=0></a>&nbsp;
        <a target="_blank" href="excelsipptvsbast.php">
          BAST - SIPPT

          <a><img alt=" " src="view/image/excel.jpg" border=0></a>&nbsp;
          <a target="_blank" href="excelsipptvsbastexcom.php">
            BAST - SIPPT (Excom)

            <a><img alt=" " src="view/image/excel.jpg" border=0></a>&nbsp;
            <a target="_blank" href="excelsipptvsbasthistory.php">
              BAST-SIPPT-History

              <a><img alt=" " src="view/image/excel.jpg" border=0></a>&nbsp;
              <a target="_blank" href="excelsipptvsbasthistoryexcom.php">
                BAST-SIPPT-History(Excom)
              </a></span></P>
-->
<script>
    var idrow = 2;

    function tambah(){
      var x=document.getElementById('datatable').insertRow(idrow);
      var td1=x.insertCell(0);
      var td2=x.insertCell(1);
      var td3=x.insertCell(2);



      td1.innerHTML="<label class='input'><input type='text' name='deskripsi[]'></label>";
      td2.innerHTML="<center><select name='jenisfasos[]' class='btn btn-sm btn-default'>           <?php
      include "koneksi.php";
      $query = "SELECT * FROM ref_jenisfasosfasum";
      $hasil = mysql_query($query);
      while ($data = mysql_fetch_array($hasil))
      {
        echo "<option value='".$data['display']."'>".$data['display']."</option>";
      }
      ?></select></center>";

      td3.innerHTML="<label class='input'><input type='number' name='luas[]'></label>";

      idrow++;
    }


    function hapus(){
     if(idrow>2){
       var x=document.getElementById('datatable').deleteRow(idrow-1);
       idrow--;
     }
   }

   	$( function() {
    	$( "#tgldokacuan" ).datepicker();
  	} );

 </script
<?php
include "koneksi.php";
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
  $target_file = $target_dir . "$namabaru.pdf";
  $ext=end(explode('.', $_FILES['fileacuan']['name']));
  $nodokacuan = $_POST['nodokacuan'];
  $tgl= $_POST['tgldokacuan'];
  $tgldokacuan=substr($tgl,3,2).'/'.substr($tgl,0,2).'/'.substr($tgl,-4);
  // echo $tgldokacuan;
  $haldokacuan= $_POST['haldokacuan'];
  $pemegangdokacuan= $_POST['pemegangdokacuan'];
  $ketdokacuan= $_POST['ketdokacuan'];
  $idkategori= $_POST['jenisdokacuan'];

  
  $check = mysql_query("SELECT nodokacuan FROM detaildokacuan WHERE nodokacuan = '$nodokacuan'") or die(mysql_error());
  $check2 = mysql_num_rows($check);

	//if the name exists it gives an error
  if ($check2 != 0)
  {
   ?>
   <script type="text/javascript">
    alert("Dokumen Acuan No:  <?php echo $nodokacuan; ?> has already registered. use has already available item ");
    history.back();
  </script>
  <?php

}else
if($_FILES["fileacuan"]["name"]!='')
{
	if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) {
	  $namafile=$_FILES['fileacuan']['name'];
	  $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `nodokacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '$nodokacuan', '');");
	    $qurey = mysql_query("insert into detaildokacuan values('$nodokacuan', '$tgldokacuan', '$haldokacuan', '$pemegangdokacuan', '$ketdokacuan', '$idkategori')") or die(mysql_error());
	    echo "The file <a href='$target_dir$namabaru.$ext'>". basename( $_FILES["fileacuan"]["name"]). "</a> has been uploaded.";
	} else {
	  echo "$target_file";
	  echo "Sorry, there was an error uploading your file.";
	}
	//simpan data ke database
}
else
{
	$qurey = mysql_query("insert into detaildokacuan values('$nodokacuan', '$tgldokacuan', '$haldokacuan', '$pemegangdokacuan', '$ketdokacuan', '$idkategori')") or die(mysql_error());
}


if ($query) {
 echo 'input jenis dokumen berhasil...........';

}

$nodokacuan2=$_POST['nodokacuan'];
if(!$_POST){  
die('Tidak ada data yang disimpan!');  
}  

//menyimpan data ke tabel peruntukan
foreach($_POST['deskripsi'] as $key => $deskripsi){  
if($deskripsi){
 $sql = "INSERT INTO `kewajiban` (`idkewajiban`, `nodokacuan`, `deskripsi`, `jenisfasos`, `luas`, `pelunasan`) VALUES ('', '{$nodokacuan2}', '{$deskripsi}', '{$_POST['jenisfasos'][$key]}', '{$_POST['luas'][$key]}', '0')";  
 
 mysql_query($sql); 
 // echo $sql; 
} 
}
echo 'Data telah disimpan';  
}
?>
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Input Data Acuan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<form name="inputdetaildokumenacuan" action="" method="post" enctype="multipart/form-data">

					<div class="row">
			        
						<section class="col col-sm-12 col-md-12 col-lg-6">
							<h2>Input Deskripsi Acuan</h2><br>

			                   <table>

			                    <tr><td>Pilih Jenis Dokumen Acuan</td>
			                      <td>  
			                        <select name="jenisdokacuan" class="select2">
			                          <?php
			                          include "koneksi.php";
			                 // query untuk menampilkan kecamatan
			                          $query = "SELECT * FROM dokumenacuan";
			                          $hasil = mysql_query($query);
			                          while ($data = mysql_fetch_array($hasil))
			                          {
			                            echo "<option value='".$data['idkategori']."'>".$data['jenisdokumen']."</option>";
			                          }
			                          ?>
			                        </select>
			                      </td>
			                    </tr>

			                    <tr>
			                      <td >No.Dokumen </td>           
			                      <td ><label class='input'><input type="text" name="nodokacuan" maxlength="80" required="required" /></label></td>
			                    </tr>

			                    <tr>
			                      <td>Tgl. Dokumen </td>
			                      <td ><label class='input'><input type="text" id="tgldokacuan" name="tgldokacuan" maxlength="10" required="required"/></label>
			                      </td>         
			                    </tr>
			                    <tr>

			                      <tr>
			                        <td>Pemegang Dokumen </td>
			                        <td><label class='input'><input type="text" name="pemegangdokacuan" maxlength="40" required="required" /></label></td>
			                      </tr>

			                      <tr>
			                        <td>Perihal</td>
			                        <td><label class="input"><input type="text" name=haldokacuan required="required" /> </label></td> 
			                      </tr> 

			                      <tr>
			                        <td>Keterangan</td>
			                        <td><label class="input"><input type="text" name=ketdokacuan required="required" /> </label></td> 
			                      </tr>  
			                      <tr>
			                        <td>File Acuan</td>
			                        <td align="right"><input type="file" class='btn btn-sm btn-default' name="fileacuan"></td> 
			                      </tr>
			                    </table>
						</section>
						

						<section class="col col-sm-12 col-md-12 col-lg-6">
							<h2>Input Data Kewajiban</h2><br>

			                      <div style="width:20; height:210px;overflow:auto;">

			                        <table class="table table-bordered table-striped" id=datatable >
			                            <tr>
			                              <td class="center">Deskripsi</td>
			                              <td class="center">Jenis Fasos Fasum</td>
			                              <td class="center">Luas</td>
			                            </tr>

			                            <tr>

			                              <td><label class='input'><input type='text' name='deskripsi[]'></label></td>
			                              <td><center><select name='jenisfasos[]' class='btn btn-sm btn-default'>

			                                <?php
			                                include "koneksi.php";
							                 // query untuk menampilkan wilayah
			                                $query = "SELECT * FROM ref_jenisfasosfasum";
			                                $hasil = mysql_query($query);
			                                while ($data = mysql_fetch_array($hasil))
			                                {
			                                  echo "<option value='".$data['display']."'>".$data['display']."</option>";
			                                }
			                                ?>
			                              </select></center></td>

			                              <td><label class='input'><input type='number' name='luas[]'></label></td>         
			                            </tr>
			                        </table>
			                      </div>
			                      <br>
			                      <input type=button class='btn btn-sm btn-info' name=tambah1 value=Tambah onclick=tambah()>
			                      <input type=button class='btn btn-sm btn-default' name=delete1 value=Delete onclick=hapus()>
						</section>
					</div>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
			                      <center><input type="submit" name="submit" value="Simpan Data Acuan" class="btn btn-lg btn-primary" /></center> 
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
