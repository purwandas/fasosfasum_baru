<?php
	if (isset($_POST['submit'])) 
	{
		include 'tracking.php';
	    $nobast=$_POST['nobast'];
	    $kodeskpd=$_POST['kodeskpd'];
		$namaskpd=$_POST['namaskpd'];
		$kodebarang=$_POST['kodebarang'];
		$namabarang=$_POST['namabarang'];
		$noregistrasi=$_POST['noregistrasi'];

	    $queryAset="update bast set kodeskpd='$kodeskpd', namaskpd='$namaskpd', kodebarang='$kodebarang', namabarang='$namabarang', noregistrasi='$noregistrasi' where nobast='$nobast'";
	    // echo "$queryAset";
	    if($queryAset=mysql_query($queryAset))
	    {
	    	tracking("SKPD Aset BAST: $nobast");
	    }
	    echo mysql_error($koneksi);
	}
	
	if(isset($_GET['nobast']))
	{
		$nobast=$_GET['nobast'];
		$queryBast=mysql_query("select kodeskpd, namaskpd, kodebarang, namabarang, noregistrasi from bast where nobast='$nobast'");
		$queryBast=mysql_fetch_array($queryBast);
		
		$kodeskpd=$queryBast['kodeskpd'];
		$namaskpd=$queryBast['namaskpd'];
		$kodebarang=$queryBast['kodebarang'];
		$namabarang=$queryBast['namabarang'];
		$noregistrasi=$queryBast['noregistrasi'];
		
?>

<article class="col-sm-12 col-md-12 col-lg-6">
	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-34" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Register Arsip PPKD</h2>
	</header>
		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<form name="PPKD" action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<center>
							<table border="0">
								<tr>
									<td>
										Kode SKPD
									</td>
									<td align="center" width="30px"> : </td>
									<td>
										<label class="input">
											<input type="hidden" name="nobast" value="<?php echo $nobast;?>">
											<input type="text" name="kodeskpd" value="<?php echo "$kodeskpd";?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Nama SKPD
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="namaskpd" value="<?php echo $namaskpd;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Kode Barang
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="kodebarang" value="<?php echo $kodebarang;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Nama Barang
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="namabarang" value="<?php echo $namabarang;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										No. Registrasi
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="noregistrasi" value="<?php echo $noregistrasi;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td colspan="3" align="right">
										<br>
										<input type="submit" name="submit" value="Register Arsip" class="btn btn-sm btn-info">
									</td>
								</tr>
							</table>
							</center>
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
<?php
	}
?>