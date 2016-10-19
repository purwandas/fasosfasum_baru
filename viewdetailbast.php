<?php 
$id = $_GET['id'];
$query = mysql_query("select * from bast b inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset a on b.nobast=a.nobastaset where nobast='$id'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>
<p class="alert alert-warning" align="right">
	<span>
    <a><img alt=" " src="img/printer.gif" border=0></a>&nbsp;
    <a target="_blank" href="pdfdetail.php?id=<?php echo $data['nobast']; ?>">
      Print this page
    </a>
    </span>
</p>
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Detail Acuan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
					
			        
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="size130">
			                <tr>
			                  <td>Jenis Acuan </td><td width="15px" align="center">: </td><td><?php echo $data['idkategori']; ?></td><td><a href="index.php?hal=editacuan&nodokacuan=<?php echo $data['nodokacuan']; ?>">[ Edit ]</a></td>
			                </tr>
			                <td>No.Dok Acuan </td><td align="center"> : </td><td><?php echo $data['nodokacuan']; ?></td>
			              </tr>
			              <tr><td>Tgl.Dok Acuan </td><td align="center"> : </td><td><?php echo $data['tgldokacuan']; ?></td>
			              </tr>
			              <tr>
			                <td>Pemegang</td><td align="center"> : </td><td><?php echo $data['pemegangdokacuan']; ?></td>
			              </tr>
			              <tr>
			                <td>Perihal</td><td align="center"> :</td><td><?php echo $data['haldokacuan']; ?></td> 
			              </tr>
			              <tr>
			                <td>Keterangan </td><td align="center"> : </td><td><?php echo $data['ketdokacuan']; ?></td> 
			              </tr>
			              <tr>
			                  <?php 
			                  $qr="select nama_asli,nama_file,path from upload where nodokacuan='$data[nodokacuan]'";
			                  $qp=mysql_query($qr);
			                  while ($dq=mysql_fetch_array($qp)) {
			                    echo"
			                    <td>File Acuan </td><td>:</td>
			                    <td>
			                    <a href='download.php?type=a&id=$data[nodokacuan]'>$dq[nama_asli]</a>
			                    </td> 
			                    ";
			                  }
			                 ?>
			              </tr>
			            </table>
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
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i> </span>
		<h2>Detail BAST</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row table-responsive">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="size130">
			                <tr>
			                  <td>No.BAST </td><td width="15px" align="center">: </td><td><?php echo $data['nobast']; ?></td><td><a href="index.php?hal=editbast&id=<?php echo $data['nobast']; ?>">[ Edit ]</a></td>

			                </tr>
			                <tr><td>Tgl. BAST </td><td align="center">: </td><td><?php echo $data['tglbast']; ?></td>
			                </tr>
			                <tr>
			                  <td>Pengembang </td><td align="center">: </td><td><?php echo $data['pengembangbast']; ?></td>
			                </tr>
			                <tr>
			                  <td>Perihal</td><td align="center">:</td><td><?php echo $data['perihalbast']; ?></td> 
			                </tr>
			                <tr>
			                  <td>Kategori </td><td align="center">:</td><td><?php echo $data['keterangan']; ?></td> 
			                </tr>
			                <tr>
			                  <td>Kode Arsip </td><td align="center">: </td><td><?php echo $data['kodearsip']; ?></td>
			                </tr>
			                <tr>
			                  <?php 
			                  $qr="select nama_asli,nama_file,path from upload where nobast='$data[nobast]'";
			                  $qp=mysql_query($qr);
			                  while ($dq=mysql_fetch_array($qp)) {
			                    echo"
			                    <td>File Acuan </td><td>:</td>
			                    <td>
			                    <a href='download.php?type=b&id=$data[nobast]'>$dq[nama_asli]</a>
			                    </td> 
			                    ";
			                  }
			                 ?>
			              </tr>
			              </table>
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
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
		                <td>Alamat lokasi</td><td width="15px" align="center">:</td><td><?php echo $data3['alamataset']; ?></td><td><a href='index.php?hal=editaset<?php echo "&id=$data3[idaset]"; ?>' >[Edit]</a></td>
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
				                    <td class="center">Action</td>
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
				                   <td class="center"><a href="index.php?hal=editperuntukan&idperuntukan=<?php echo $data2['idperuntukan']; ?>">Edit</a>|<a href="hapusperuntukan.php?idperuntukan=<?php echo $data2['idperuntukan']."&id=$_GET[id]"; ?>" onClick="return konfirmasi()">Hapus</a></td>
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
				     <a  href="index.php?hal=akunshowdata&id=<?php echo $data['nobast']; ?>">Show Data Akun ....</a></span>

					</div>
				</fieldset>
			</div>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->

<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i> detail</span>
		<h2>Status Asal Dokumen</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
					<?php

           if(isset($_REQUEST['submit22'])) {
             
             if (isset($_POST['pulomas'])) 
             {
               $query = mysql_query("update lokasidokumen set  pulomas='1'   where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  pulomas='0'   where nobastlokasi='".$data['nobast']."'") or die(mysql_error());

             if (isset($_POST['bpk357'])) 
             {
               $query = mysql_query("update lokasidokumen set  bpk357='1'   where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  bpk357='0'   where nobastlokasi='".$data['nobast']."'") or die(mysql_error());



             if (isset($_POST['rekon163']))
             {
               $query = mysql_query("update lokasidokumen set  rekon163='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  rekon163='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());


             if (isset($_POST['rekon54']))
             {
               $query = mysql_query("update lokasidokumen set  rekon54='1'  where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  rekon54='0'  where nobastlokasi='".$data['nobast']."'") or die(mysql_error());


             if (isset($_POST['rekon101']))
             {
               $query = mysql_query("update lokasidokumen set  rekon101='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  rekon101='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());


             if (isset($_POST['rekon129']))
             {
               $query = mysql_query("update lokasidokumen set  rekon129='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  rekon129='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());

             if (isset($_POST['balaikota']))
             {
               $query = mysql_query("update lokasidokumen set  balaikota='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  balaikota='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());


             if (isset($_POST['kel90']))
             {
               $query = mysql_query("update lokasidokumen set  kel90='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  kel90='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());


             if (isset($_POST['tp3w']))
             {
               $query = mysql_query("update lokasidokumen set  tp3w='1'where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  tp3w='0'where nobastlokasi='".$data['nobast']."'") or die(mysql_error());

             if (isset($_POST['lokasi58']))
             {
               $query = mysql_query("update lokasidokumen set  lokasi58='1'where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  lokasi58='0'where nobastlokasi='".$data['nobast']."'") or die(mysql_error());


             if (isset($_POST['dtr']))
             {
               $query = mysql_query("update lokasidokumen set  dtr='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  dtr='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());

             if (isset($_POST['mutasi']))
             {
               $query = mysql_query("update lokasidokumen set  mutasi='1' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
             }else $query = mysql_query("update lokasidokumen set  mutasi='0' where nobastlokasi='".$data['nobast']."'") or die(mysql_error());

             echo 'simpan perubahan data asal dokumen berhasil...........';

           }
           ?>
			        
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<form method="post" action="index.php?hal=viewdetailbast&id=<?php echo $_GET['id']; ?>">
							   No.BAST:  <?php echo $data['nobast']; ?>
								<br>
						       Check one or more box bellow to save Document source information ...
							   <br>
					   <?php
					   $query4 = mysql_query("select * from lokasidokumen where nobastlokasi='".$data['nobast']."'") or die(mysql_error());
					   while ($data4 = mysql_fetch_array($query4)){
					     ?>
				     <table class="list" >
       
				       <tr>
				        <td><input type="checkbox" name="rekon163" value="1" <?php if($data4['rekon163'] == 1){echo 'checked="checked"';}?>/> Data Rekon 163<br/>
				           <input type="checkbox" name="bpk357" value="1" <?php if($data4['bpk357'] == 1){echo 'checked="checked"';}?>/> Data LK2010<br/>
				           <input type="checkbox" name="rekon54" value="1" <?php if($data4['rekon54'] == 1){echo 'checked="checked"';}?>/> Data Rekon 54<br/>
				          </td>
			           <td><input type="checkbox" name="rekon101" value="1" <?php if($data4['rekon101'] == 1){echo 'checked="checked"';}?>/> Data Rekon 101<br/>
			             <input type="checkbox" name="rekon129" value="1" <?php if($data4['rekon129'] == 1){echo 'checked="checked"';}?>/> Data Rekon 129<br/>
			             <input type="checkbox" name="mutasi" value="1" <?php if($data4['mutasi'] == 1){echo 'checked="checked"';}?>/> Data Mutasi<br/>
			            </td>
			             <td><input type="checkbox" name="pulomas" value="1" <?php if($data4['pulomas'] == 1){echo 'checked="checked"';}?>/> Data Pulo Mas<br/>
			               <input type="checkbox" name="balaikota" value="1" <?php if($data4['balaikota'] == 1){echo 'checked="checked"';}?>/> Data Balai Kota Lt.7 <br/>
			               <input type="checkbox" name="kel90" value="1" <?php if($data4['kel90'] == 1){echo 'checked="checked"';}?>/> None 
			             </td>
		               <td><input type="checkbox" name="tp3w" value="1" <?php if($data4['tp3w'] == 1){echo 'checked="checked"';}?>/> Data TP3W <br/>
		                 <input type="checkbox" name="lokasi58" value="1" <?php if($data4['lokasi58'] == 1){echo 'checked="checked"';}?>/> Data 58 <br/>	
		                 <input type="checkbox" name="dtr" value="1" <?php if($data4['dtr'] == 1){echo 'checked="checked"';}?>/> Data DTR <br/><br>	
		                </td>
		               </tr>
		               <tr>
		                 <td colspan="4" align="right"><input type="submit" value="Simpan Perubahan" name="submit22" class="btn btn-lg btn-info"></td>
		               </tr>
		               
		             </table>
             <?php }?>
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
