<?php 
$id = $_GET['id'];
$query = mysql_query("select * from bast b inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset a on b.nobast=a.nobastaset where nobast='$id'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>
<!-- <p class="alert alert-warning" align="right">
	<span>
    <a><img alt=" " src="img/printer.gif" border=0></a>&nbsp;
    <a target="_blank" href="pdfdetail.php?id=<?php echo $data['nobast']; ?>">
      Print this page
    </a>
    </span>
</p> -->
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Detail Acuan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form"  style="height: 310px">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
					
			        
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="size130">
			                <tr>
			                  <td>Jenis Acuan </td><td width="15px" align="center">: </td><td><?php echo $data['idkategori']; ?></td>
			                  <td>
			                  
			                  <?php
                      	if($_SESSION['SESS_LEVEL']==1)
                      	{
                        	?>
                        	<a href="index.php?hal=editacuan&nodokacuan=<?php echo $data['nodokacuan']; ?>" target='_blank'>[ Edit ]</a>
                        	<?php
                      	}
                      	?>
			                  </td>
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
			                  $qr="select nama_asli,nama_file,path from upload where idacuan='$data[nodokacuan]'";
			                  $qp=mysql_query($qr);
			                  while ($dq=mysql_fetch_array($qp)) {
			                    echo"
			                    <td>File Acuan </td><td>:</td>
			                    <td>
			                    <a href='download.php?type=a&id=$data[nodokacuan]' target='_blank'>$dq[nama_asli]</a>
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
		<div class="smart-form" style="height: 310px">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row table-responsive">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="size130">
			                <tr>
			                  <td>No.BAST </td><td width="15px" align="center">: </td><td><?php echo $data['nobast']; ?></td>
			                  <td>
		                  <?php
			            if($_SESSION['SESS_LEVEL']==1)
                      	{
                        	?>
                        	<a href="index.php?hal=editbast&id=<?php echo $data['nobast']; ?>" target='_blank'>[ Edit ]</a>
                        	<?php
                      	}
                      	?>
			                  </td>

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
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-5" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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


