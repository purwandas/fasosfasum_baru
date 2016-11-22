<?php 
$id = $_GET['id'];

?>
<!-- <p class="alert alert-warning" align="right">
	<span>
	<a target="_blank" href="print.php" >
	<img alt=" " src="img/printer.gif" border=0>
	</a>&nbsp;
	<a target="_blank" href="print.php">
		Print this page
	</a>
	</span>
</p>
 -->
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Data BAST</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row" style="height: 240px">
					
			        
						<section class="col col-sm-12 col-md-12 col-lg-12">
						<?php
							$query = mysql_query("select * from bast b inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset a on b.nobast=a.nobastaset where nobast='$id'") or die(mysql_error());
							$data = mysql_fetch_array($query);
						?>
							<table>
								<tr>
									<td>No.BAST </td><td>: </td><td><?php echo $data['nobast']; ?></td><td>

								</tr>
								<tr><td>Tgl. BAST </td><td>: </td><td><?php echo $data['tglbast']; ?></td>
								</tr>
								<tr>
									<td>Pengembang </td><td>: </td><td><?php echo $data['pengembangbast']; ?></td>
								</tr>
								<tr>
									<td>Perihal</td><td>:</td><td><?php echo $data['perihalbast']; ?></td> 
								</tr>
								<tr>
									<td>Kategori </td><td>:</td><td><?php echo $data['keterangan']; ?></td> 
								</tr>
								<tr>
								</tr>
								<tr>
									<td>Jenis Acuan </td><td>: </td><td><?php echo $data['idkategori']; ?></td>
								</tr>
									<td>No.Dok Acuan </td><td>: </td><td><?php echo $data['nodokacuan']; ?></td>
								</tr>
								<tr><td>Tgl.Dok Acuan </td><td>: </td><td><?php echo $data['tgldokacuan']; ?></td>
								</tr>
								<tr>
									<td>Pemegang</td><td>: </td><td><?php echo $data['pemegangdokacuan']; ?></td>
								</tr>
								<tr>
									<td>Perihal</td><td>:</td><td><?php echo $data['haldokacuan']; ?></td> 
								</tr>
								<tr>
									<td>Keterangan </td><td>:</td><td><?php echo $data['ketdokacuan']; ?></td> 
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
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Penjelasan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row"  style="height: 240px">
					
			        
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<?php
							$query6 = mysql_query("select * from penjelasan where nobast='$id'") or die(mysql_error());
							$data6 = mysql_fetch_array($query6);
							?>
								Detail Penjelasan:
								<table>
									<tr>
										<textarea name=detail rows=10 cols=80  /><?=$data6['detailpenjelasan'] ?> </textarea></td> 
									</tr></br>
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
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Detail Akun Peruntukan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
					
			        
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<div style="width:1140px; overflow:auto;">
											<table>
												<?php 
												include "koneksi.php";
												$id = $_GET['id'];
												$query3 = mysql_query("select * from dataaset where nobastaset='$id'") or die(mysql_error());
												while ($data3 = mysql_fetch_array($query3)){
													?>

													<input type="hidden"  name="idaset" value="<?php echo $data3['idaset']; ?>">
													<tr>
														<td>ID Lokasi</td><td>:</td><td><?php echo $data3['idaset']; ?></td>
													</tr>
													<tr>
														<td>Alamat lokasi</td><td>:</td><td><?php echo $data3['alamataset']; ?></td>
													</tr>
													<tr>
														<td>Wilayah</td><td>:</td><td><?php echo $data3['wilayah']; ?></td>
													</tr>
													<tr>
														<td>Kecamatan</td><td>:</td><td><?php echo $data3['kecamatan']; ?></td>
													</tr>
													<tr>
														<td>Kelurahan</td><td>:</td><td><?php echo $data3['kelurahan']; ?></td>
													</tr>


													<tr>
														
														<table class="table table-hover table-bordered table-striped">
															
																<tr>
																	<td class="center">No.</td>
																	<td class="center">ID</td>
																	<td class="center">Peruntukan</td>
																	
																	<td class="center">Kategori KIB</td>
																	<td class="center">Volume</td>
																	<td class="center">Satuan</td>
																	<td class="center">Nilai Pengali (Rp)</td>
																	<td class="center">Penilaian PerGub 132 (Rp)</td>
																	<td class="center">Nilai BAST (Rp)</td>
																	<td class="center">Nilai Kombinasi (Rp)</td>
																	<td class="center">Keterangan</td>
																	<td class="center">Journal Koreksi</td>
																<?php
										                          if($_SESSION['SESS_LEVEL']==1)
										                          {
										                              ?>
										                              <td class="center">Action</td>
										                              <?php
										                          }
										                          ?>
																	
																</tr>

																<script language="JavaScript">

																	function konfirmasi(){
																		var pilihan = confirm("Are you sure want to delete this data ?");
																		if(pilihan){
																			return true
																		}else{
																			return false
																		}
																	}
																</script>

																<?php 
																$query2 = mysql_query("select * from akun a inner join peruntukan b on a.idperuntukan=b.idperuntukan where a.idaset='".$data3['idaset']."'") or die(mysql_error());

																$no = 1;
																while ($data2 = mysql_fetch_array($query2)){
																	
																	?>

																	<tr>
																		<td class="center"><?php echo $no; ?></td>
																		
																		<td class="left"><?php echo $data2['idperuntukan']; ?></td>
																		
																		<td class="left"><?php echo $data2['deskripsi']; ?></td>
																		<td class="center"><?php echo $data2['kategoriaset']; ?></td>
																		<td class="center"><?php print number_format ($data2['volume']); ?></td>
																		<td class="center"><?php echo $data2['satuan']; ?></td>
																		<td class="center"><?php print number_format  ($data2['nilainjop'],2); ?></td>
																		<td class="center"><?php print number_format  ($data2['jumnjop'],2); ?></td>
																		<td class="center"><?php print number_format  ($data2['nilaibast'],2); ?></td>
																		<td class="center"><?php print number_format  ($data2['nilaimix'],2); ?></td>
																		<td class="right"><?php echo $data2['ketakun']; ?></td>	
																		<td class="right"><?php echo $data2['bastdokumen']; ?></td>	
																<?php
										                          if($_SESSION['SESS_LEVEL']==1)
										                          {
										                              ?>
										                              <td class="center"><a href="index.php?hal=akunedit&id=<?php echo $data2['nobast']; ?>">Edit</a>|<a href="akunhapus.php?id=<?php echo $data2['idperuntukan'];  echo "&id2=".$data2['nobast']; ?>" onClick="return konfirmasi()">Hapus</a></td>
										                              <?php
										                          }
										                          ?>	
																		
																	</tr>


																	<?php
																	$no++;
																}

																$query1 = mysql_query("select distinct nobast,totnjop, totbast, totapp, totmix, bastdokumen  from akun where idaset='".$data3['idaset']."'") or die(mysql_error());
																$data1 = mysql_fetch_array($query1);



																?>
																	<tr>
																		<td class="text-center" colspan="7">Total</td>
																		<td class="center"><?php print number_format ($data1['totnjop'],2); ?></td>
																		<td class="center"><?php print number_format ($data1['totbast'],2); ?></td>
																		<td class="center"><?php print number_format ($data1['totmix'],2); ?></td>
																		<td colspan="3"><?php ?></td>		
																	</tr>

														</table>

													</tr>

												<?php
												}
												?>
											</table>


										</div>
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

