<?php
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
    $id=$_POST['id'];
    $tglbast= $_POST['tglbast'];
    $tglbast=substr($tglbast, 3,2).'/'.substr($tglbast, 0,2).substr($tglbast, -5);
    // echo "$tglbast";
    $perihalbast= $_POST['perihalbast'];
    $pengembangbast= $_POST['pengembangbast'];
    $keterangan= $_POST['keterangan'];
    $kodearsip= $_POST['kodearsip'];
    $nodokacuan= $_POST['nodokacuan'];
if($_FILES["fileacuan"]["tmp_name"]!='')
{
    if (move_uploaded_file($_FILES["fileacuan"]["tmp_name"], $target_file)) {
      $namafile=$_FILES['fileacuan']['name'];
      if($id!=''){
        $dupload=mysql_query("delete from upload where nobast='$id'");
      }
      $upload=mysql_query("INSERT INTO `upload` (`id`, `nama_asli`, `nama_file`, `path`, `idacuan`, `nobast`) VALUES ('', '$namafile', '$namabaru.$ext', '$target_dir', '', '$id');");
      $query ="update bast set  tglbast='$tglbast', perihalbast='$perihalbast',pengembangbast='$pengembangbast',keterangan='$keterangan',nodokacuan='$nodokacuan' where nobast='$id'";
      // echo "The file <a href='$target_dir$namabaru.$ext'>". basename( $_FILES["fileacuan"]["name"]). "</a> has been uploaded.";
    } else {
      echo "$target_file";
      echo "Sorry, there was an error uploading your file.";
    }
}else{
      $query ="update bast set  tglbast='$tglbast', perihalbast='$perihalbast',pengembangbast='$pengembangbast',keterangan='$keterangan',nodokacuan='$nodokacuan' where nobast='$id'";
}
//update data ke database

    if ($query=mysql_query($query)) {
    	include 'tracking.php';
    	tracking("Ubah BAST: $id");
     // echo 'simpan perbahan data bast berhasil...........';

   }
 }
 ?>
 <script type="text/javascript">
 	$( function() {
    	$( "#tglbast" ).datepicker();
  	} );
 </script>
 <article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-20" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2> Ubah BAST</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<?php 
					           $id = $_GET['id'];

					           $query = mysql_query("select * from bast where nobast='$id'") or die(mysql_error());

					           $data = mysql_fetch_array($query);
					           ?>

					           <form name="editbast" action="" method="post" enctype="multipart/form-data">
					             <input type="hidden" name="id" value="<?php echo $id; ?>" />
					             <center>
					             <table>

					              <tr>
					                <td width="140px">No.BAST</td>           
					                <td height="21"><label class="input"><input type="text" name="nobast" maxlength="20" required="required" value="<?php echo $data['nobast']; ?>" disabled /></label></td>
					              </tr>

					              <tr>
					                <td>Tgl. BAST </td>
					                <td height="21"><label class="input"><input type="text" id="tglbast" name="tglbast" maxlength="10" required="required" value="<?php echo substr($data['tglbast'],3,2).'/'.substr($data['tglbast'],0,2).'/'.substr($data['tglbast'],-4); ?>"/></label>
					                </td>         
					              </tr>
					              <tr>
					                <td>Nama Pengembang </td>
					                <td><label class="input"><input type="text" name="pengembangbast" maxlength="40" required="required" value="<?php echo $data['pengembangbast']; ?>"/></label></td>
					              </tr>
					              <tr>
					                <td>Perihal</td>
					                <td><label class="input">
					                <input type="text" name=perihalbast  required="required" <? echo"value=$data[perihalbast]";?> > </label></td> 
					              </tr> 


					              <tr>
					                <td>Kategori</td>
					                <td>
					                <select  name=keterangan  class="btn btn-default btn-sm">
			                	<?php
			                		echo"
			                			<option value='$data[keterangan]'>
			                			$data[keterangan]
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
					              <tr>
					                <td>No.Dokumen Acuan </td>
					                <td><select name='nodokacuan' class="select2">
						                 <?php
						                 	echo"
					                			<option value='$data[nodokacuan]'>
					                			$data[nodokacuan]
					                			</option>
					                		";
						                 $queryAcuan = "SELECT * FROM detaildokacuan where versi='0'";
						                 $hasilAcuan = mysql_query($queryAcuan);
						                 while ($dataAcuan = mysql_fetch_array($hasilAcuan))
						                 {
						                  echo "<option value='".$dataAcuan['nodokacuan']."'>".$dataAcuan['nodokacuan']."</option>";
						                }
						                ?>
						              </select>
						            </td>
					              </tr>

					              
					              <tr>
					                <td>File Acuan </td>
					                <td>
					                 <?php 
					                 $qr="select nama_asli,nama_file,path from upload where nobast='$data[nobast]'";
					                 // echo "$qr";
					                 $qp=mysql_query($qr);
					                 while ($dq=mysql_fetch_array($qp)) {
					                  echo"
					                  <a target='_blank' href='download.php?type=b&id=$data[nobast]'>$dq[nama_asli]</a>
					                  <br>
					                  ";
					                }
					                ?>
					                <input type="file" name="fileacuan" class="btn btn-sm btn-default">
					              </td>
					            </tr>
					            <tr>
					              <td align="center" colspan="2">
					              <br>
					              <input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-lg btn-info"> </td>
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

<!-- WIDGET END -->
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-45" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i> </span>
		<h2>Detail Peruntukan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
					
			        <?php 
		           $query3 = mysql_query("select * from dataaset where nobastaset='$id'") or die(mysql_error());
		           while ($data3 = mysql_fetch_array($query3)){
		             ?>
		             <table style="margin-left: 15px">
		              <tr>
		                <td>Alamat lokasi</td><td width="15px" align="center">:</td><td><?php echo $data3['alamataset']; ?></td>
		                <td>
		                <?php
                      	if($_SESSION['SESS_LEVEL']==1)
                      	{
                        	?>
                        	<a href='index.php?hal=editaset<?php echo "&id=$data3[idaset]"; ?>'  target='_blank'>[Edit]</a>
                        	<?php
                      	}
                      	?>
		                </td>
		              </tr>
		              <tr>
		               <td >Wilayah</td><td align="center">:</td><td colspan='2'><?php echo $data3['wilayah']; ?></td>
		             </tr>
		             <tr>
		               <td >Kecamatan</td><td align="center">:</td><td colspan='2'><?php echo $data3['kecamatan']; ?></td>
		             </tr>
		             <tr>
		               <td >Kelurahan</td><td align="center">:</td><td colspan='2'><?php echo $data3['kelurahan']; ?></td>
		             </tr>
			    	</table>
						<section class="col col-sm-12 col-md-12 col-lg-12 table-responsive">
							<table class="size130 table table-hover table-striped">
				                  <tr>
				                    <td class="center">No.</td>        	
				                    <td class="center">Peruntukan</td>
				                    <td class="center">Jenis</td>
				                    <td class="center">Volume</td>
				                    <td class="center">Sertifikasi</td>
				                    <td class="center">Pemilik</td>
				                    <td class="center">Jenis Sertifikat</td>
				                    <td class="center">Masa Berlaku</td>
				                    <td class="center">Keterangan</td>
				                    <td class="center">Jenis Fasos Fasum</td>
				                  <td class="center">Status Sertifikat</td>
				                    <td class="center">No. Sertifikat</td>
				                    <td class="center">Tgl.Sertifikat</td>
				                    <td class="center">Luas Sertifikat</td>
				                  <td class="left">Status Plang</td>
				                  <td class="center">Status Penggunaan</td>
				                  <td class="center">No.SK</td>
				                    <td class="center">Tgl.SK</td>
				                    <td class="center">SKPD</td>
				                  <td class="right">Sensus Fasos Fasum</td>
				                  <td class="center">No. Acuan</td>
				               <?php
	                          if($_SESSION['SESS_LEVEL']==1)
	                          {
	                              echo "<td class='center'>Action</td>";
	                          }
	                          ?>
				                    
				                  </tr>
				                  <script language="JavaScript">
				                    function konfirmasi(){
				                     var pilihan = confirm("Are you sure want to delete");
				                     if(pilihan){
				                      return true
				                    }else{
				                      return false
				                    }
				                  }
				                </script>
				                <?php 
				                $query2 = mysql_query("select * from peruntukan where idaset='".$data3['idaset']."'") or die(mysql_error());
				                $no = 1;
				                while ($data2 = mysql_fetch_array($query2)){
				                 ?>
				                 <input type="hidden" name="id" value="<?php echo $nobast; ?>"
				                 <tr>
				                   <td class="center"><?php echo $no; ?></td>
				                   <td class="left"><?php echo $data2['deskripsi']; ?></td>
				                   <td class="center"><?php echo $data2['jenis']; ?></td>
				                   <td class="right"><?php echo $data2['luas']; ?></td>
				                   <td class="left"><?php echo $data2['sertifikasi']; ?></td>
				                   <td class="left"><?php echo $data2['pemilik']; ?></td>
				                   <td class="center"><?php echo $data2['jenissertifikat']; ?></td>
				                   <td class="center"><?php echo $data2['masaberlaku']; ?></td>
				                   <td class="left"><?php echo $data2['keterangan']; ?></td>
				                   <td class="center"><?php echo $data2['jenisfasos']; ?></td>
				                  <td class="center"><?php echo $data2['statussertifikat']; ?></td>
				                   <td class="left"><?php echo $data2['nosertifikat']; ?></td>
				                   <td class="right"><?php echo $data2['tglsertifikat']; ?></td>
				                   <td class="right"><?php echo $data2['luassertifikat']; ?></td>
				                  <td class="left"><?php echo $data2['statusplang']; ?></td>
				                  <td class="center"><?php echo $data2['statuspenggunaan']; ?></td>
				                  <td class="left"><?php echo $data2['nosk']; ?></td>
				                   <td class="right"><?php echo $data2['tglsk']; ?></td>
				                   <td class="right"><?php echo $data2['skpd']; ?></td>
				                  <td class="right"><?php echo $data2['sensusfasos']; ?></td>
				                  <td class="center"><a href=index.php?hal=bastbysippt&id=<?php echo $data2['nodokacuan'].">$data2[nodokacuan]"; ?></a></td>
				                  <?php
		                          if($_SESSION['SESS_LEVEL']==1)
		                          {
		                              ?>
		                              <td class="center"><a href="index.php?hal=editperuntukan&idperuntukan=<?php echo $data2['idperuntukan'].'&p='.$_GET['hal'].'&id='.$_GET['id']; ?>"  target='_blank'>Edit</a>|<a href="hapusperuntukan.php?idperuntukan=<?php echo $data2['idperuntukan']."&id=$_GET[id]"; ?>" onClick="return konfirmasi()">Hapus</a></td>
		                              <?php
		                          }
		                          ?>
				                 </tr>
				                <?php
				                $no++;
				              }
				              ?>
				          </table>
						</section>
					<?php
				      }
				    ?>
				    <a  href="index.php?hal=akunshowdata&id=<?php echo $data['nobast']; ?>" ></li>
				     <img alt=" " src="img/viewdetail.gif" border=0></a>
				     <a  href="index.php?hal=akunshowdata&id=<?php echo $data['nobast']; ?>" target='_blank'>Show Data Akun ....</a></span>

					</div>
				</fieldset>
			</div>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->
