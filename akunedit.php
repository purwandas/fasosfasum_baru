<script type="text/javascript">
	$(function(){
		$(".volume").keyup(function(){
			var jmlnjop = $(this).parent().next().next().next().find('.jmlnjop');
			var nilainjop = $(this).parent().next().next().find('.nilainjop');
			$(jmlnjop).val($(this).val() * $(nilainjop).val());
		});
		$(".nilainjop").keyup(function(){
			var jmlnjop = $(this).parent().next().find('.jmlnjop');
			var volume = $(this).parent().prev().prev().find('.volume');
			$(jmlnjop).val($(this).val()*$(volume).val());
		});
	});
</script>



<script type="text/javascript">
	$(function(){
		$('input[name^="nilainjop"]').keyup(function(){

			var total = 0;
			$('input[name^="nilainjop"]').each(function(){
				var volume = $(this).parent().prev().prev().find('input[name^="volume"]');

				total += parseFloat($(this).val()*$(volume).val());
			});
			$("#total").val(total);
		});
	});
</script>




<script type="text/javascript">
	$(function(){
		$('input[name^="volume"]').keyup(function(){

			var total = 0;
			$('input[name^="volume"]').each(function(){
				var nilainjop = $(this).parent().next().next().find('input[name^="nilainjop"]');

				total += parseFloat($(this).val()*$(nilainjop).val());
			});
			$("#total").val(total);
		});
	});
</script>




<script type="text/javascript">
	$(function(){
		$('input[name^="nilaibast"]').keyup(function(){

			var total = 0;
			$('input[name^="nilaibast"]').each(function(){

				total += parseFloat($(this).val());
			});
			$("#total1").val(total);
		});
	});
</script>



<script type="text/javascript">
	$(function(){
		$('input[name^="nilaimix"]').keyup(function(){

			var total = 0;
			$('input[name^="nilaimix"]').each(function(){

				total += parseFloat($(this).val());
			});
			$("#total3").val(total);
		});
	});
</script>

<?php

function jin_date_sql($date){
	$exp = explode('/',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}


if (isset($_POST['submit'])){

	$nobast=$_POST['nobast'];

	$tanggal =$_POST['tglbast'];

	$tglsql=jin_date_sql($tanggal);
	// echo $_POST['tglbast']." <<post";
	// echo "$tanggal ->> $tglsql";

	foreach($_POST['idperuntukan'] as $key => $value){
		if($value){


//update data ke database
			$queryEdit="update akun set idperuntukan='".$value."',nobast='".$_POST['nobast']."',tglbast='".$tglsql."',idaset='".$_POST['idaset']."',kategoriaset='".$_POST['kategori'][$key]."',volume='".$_POST['volume'][$key]."',satuan='".$_POST['satuan'][$key]."',nilainjop='".$_POST['nilainjop'][$key]."',nilaibast='".$_POST['nilaibast'][$key]."',nilaimix='".$_POST['nilaimix'][$key]."', nilaiapp='0',jumnjop='".$_POST['jmlnjop'][$key]."',jumapp='0',ketakun='".$_POST['ketakun'][$key]."',totnjop='".$_POST['total']."',totbast='".$_POST['total1']."',totmix='".$_POST['total3']."', totapp='".$_POST['total2']."',bastdokumen='".$_POST['bastdokumen'][$key]."' where idperuntukan='".$value."'";
			// echo "<br>".$queryEdit."<br>";
			$query = mysql_query($queryEdit) or die(mysql_error()) ;




		}
		echo 'Edit data akun berhasil .....';

	}

	mysql_connect("localhost","root","");
	mysql_select_db("phplogin");
	$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
	$user = $_SESSION['SESS_FIRST_NAME'];
	$query33 = mysql_query("insert into loging values('','$user','edit nilai akuntansi bast : $nobast','$waktu')") or die(mysql_error());
}
?>
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Edit Akun Peruntukan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
									<script language="JavaScript">
										function konfirmasi(){
											var pilihan = confirm("You will make data akun zero, Are you sure want to delete All Data Akun?");
											if(pilihan){
												return true
											}else{
												return false
											}
										}
									</script>



									<form name="akunting" action="" method=post>

											<div>
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
													</table>

														<div style="overflow:auto;">

															<table class="table table-striped" >
																	<tr>
																		<td class="center">No.</td>
																		<td class="center">Peruntukan</td>
																		<td class="center">Kategori</td>
																		<td class="center">Volume</td>
																		<td class="center">Satuan</td>
																		<td class="center">Nilai Pengali (Rp)</td>
																		<td class="center">Penilaian PerGub 132 (Rp)</td>
																		<td class="center">Nilai BAST (Rp)</td>
																		<td class="center">Nilai Kombinasi (Rp)</td>
																		<td class="center">Keterangan</td>
																		<td class="center">Koreksi</td>
																	</tr>

																	<?php 

																	$query2 = mysql_query("select * from akun a inner join peruntukan b on a.idperuntukan=b.idperuntukan where a.idaset='".$data3['idaset']."'") or die(mysql_error());

																	$no = 1;
																	while ($data2 = mysql_fetch_array($query2)){
																		?>
																		

																		<tr>
																			<td class="center"><?php echo $no; ?></td>
																			<td>
																				<input type="hidden"  'text' name='idperuntukan[]' value="<?php echo $data2['idperuntukan']; ?>" >
																				<input type="hidden" name="nobast" value="<?php echo $id; ?>">
																				<input type="hidden" name="tglbast" value="<?php echo $data2['tglbast']; ?>">
																				<input type='text' name='deskripsi[]' value="<?php echo $data2['deskripsi']; ?>"></td>

																			<td><select  name='kategori[]'><option value="<?php echo $data2['kategoriaset']; ?>"><?php echo $data2['kategoriaset']; ?></option><option>KIB A</option><option>KIB B</option><option>KIB C</option><option>KIB D</option><option>KIB E</option></select>
																			</td>
																				<td><input type='text' id="volume" name='volume[]' value="<?php echo $data2['volume']; ?>" class='volume'></td>

																				<td><select name='satuan[]'><option value="<?php echo $data2['satuan']; ?>"><?php echo $data2['satuan']; ?></option><option>m</option><option>m1</option><option>m2</option><option>m3</option><option>unit</option><option>paket</option> <option>titik</option> <option>buah</option><option>set</option></select>
																				</td>
																					<td><input type='text' id="nilainjop" name='nilainjop[]' value="<?php echo $data2['nilainjop']; ?>" class='nilainjop' onkeypress="return isNumberKey(event)"></td>
																					<td><input type='text' id="jmlnjop" name='jmlnjop[]' value="<?php echo $data2['jumnjop']; ?>" class='jmlnjop'></td>
																					<td><input type='text' name='nilaibast[]' value="<?php echo $data2['nilaibast']; ?>" class='nilaibast' onkeypress="return isNumberKey(event)"></td>
																					<td><input type='text' name='nilaimix[]' value="<?php echo $data2['nilaimix']; ?>" class='nilaimix' onkeypress="return isNumberKey(event)"></td>

																					<td><input type='text' name='ketakun[]' value="<?php echo $data2['ketakun']; ?>"></td>

																					<td><select name='bastdokumen[]'><option value="<?php echo $data2['bastdokumen']; ?>"><?php echo $data2['bastdokumen']; ?></option><option>Salah Entry</option><option>Belum Entry</option><option>Perolehan ke Pergub</option><option>Pergub ke Perolehan</option> <option>Lain-lain</option><option>Tidak Ada Perubahan</option></select>
																			</tr>

																					<?php
																					$no++;
																				}
																				?>

																		</table>
																	</div>



																		

																	<table>
																		<?php 

																		$query4 = mysql_query("select distinct nobast,totnjop, totbast, totapp, totmix from akun where idaset='".$data3['idaset']."'") or die(mysql_error());


																		while ($data4 = mysql_fetch_array($query4)){
																			?>

																			<tr>
																			<td></td>
																			<td><b>Total Nilai PerGub132 : </b></td>
																			<td><label class='input'><input type='text' value= "<?php echo $data4['totnjop']; ?>" name='total' id='total'/></label></td>
																			</tr><tr>
																			<td></td><td><b>Total Nilai BAST : </b></td><td><label class='input'><input type='text' value="<?php echo $data4['totbast']; ?>" name='total1' id='total1'/></label></td>
																			</tr><tr>
																			<td></td><td><b>Total Nilai Kombinasi : </b></td><td><label class='input'><input type='text' value="<?php echo $data4['totmix']; ?>" name='total3' id='total3'/></label></td>
																			</tr><tr>
																			<td></td><td><b>Total Nilai Appraisal : </b></td><td><label class='input'><input type='text' value="<?php echo $data4['totapp']; ?>" name='total2' id='total2'/></label></td>
																			</tr><tr>

																			
																			<?php
																		}
																		?>

																		<td colspan='3'>
																			 
																		</td>
																		</tr>
																		<tr>
																		<td colspan='3'>
																			<center>
																			<br>
																		<input class='btn btn-info btn-sm' type=submit name="submit" value="Edit Data Akun" />
																			</center>
																		</td>

																		</tr>
																		</table>
																		<br>
																		<br>
																		<br>
																		<table>
																		<tr>
																			<td colspan='3'>
																		<?php
																		// echo"
																		// <P align=left>
																		// 		<span>
																		// 		<a  href='akuntambahperuntukan.php?id=$data3[idaset]' >
																		// 			<img src='view/image/add.png' border=0></a>
																		// 			<a  href='akuntambahperuntukan.php?id=$data3[idaset]'>Tambah Peruntukan..</a></span>

																		// 			<span>
																		// 			<a  href='viewdetailbast.php?id=$data3[nobastaset]' >
																		// 				<img src='view/image/setting.png' border=0></a>
																		// 				<a  href='viewdetailbast.php?id=$data3[nobastaset]'>Edit Peruntukan..</a></span>
																		// 				<span>
																		// 				<a  href='akunhapus3.php?id=$id' >
																		// 					<img src='view/image/filemanager/edit-delete.png' border=0></a>
																		// 					<a  href='akunhapus3.php?id=$id' onClick='return konfirmasi()'>Reset Akun</a></span>
																		// 					</P>
																		// ";
																		?>
																			</td>
																		</tr>
																						</table>


																							<table>
																								<tr>
																									<tr><td>Keterangan :</td></tr>
																									<tr><td>KIB A : Tanah</td></tr>
																									<tr><td>KIB B : Peralatan dan Mesin</td></tr>
																									<tr><td>KIB C : Gedung dan Bangunan</td></tr>
																									<tr><td>KIB D : Jalan, Jaringan dan Instalasi</td></tr>
																									<tr><td>KIB E : Aset Tetap Lainnya</td></tr>
																								</tr>
																							</table>
																						</tr>

																						<?php

																					}
																					?>
																						</table>


																			</div>
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