<?php
	if (isset($_POST['submit'])) 
	{
		include 'tracking.php';
	    $nobast=$_POST['nobast'];

		$tglarsip= $_POST['tglarsip'];
	    $cekTgl=mysql_query("select tglarsip from bast where nobast='$nobast'");
	    $cekTgl=mysql_fetch_array($cekTgl);
	    if($cekTgl['tglarsip']!=$tglarsip)
	    {
	      $tglarsip=substr($tglarsip, -4).'-'.substr($tglarsip, 0,2)."-".substr($tglarsip, 3,2);
	    }else{
	      $tglarsip=substr($tglarsip,-4).'-'.substr($tglarsip, 3,2).'-'.substr($tglarsip, 0,2);
	    }

	    $kodearsip=$_POST['kodearsip'];
	    $lokasiarsip=$_POST['lokasiarsip'];

	    $queryArsip="update bast set kodearsip='$kodearsip', tglarsip='$tglarsip', lokasiarsip='$lokasiarsip' where nobast='$nobast'";
	    // echo "$queryArsip <-- query";
	    if($queryArsip=mysql_query($queryArsip))
	    {
	    	tracking("Register Aset BAST: $nobast");
	    }
	}
	
	if(isset($_GET['nobast']))
	{
		$nobast=$_GET['nobast'];
		$queryBast=mysql_query("select kodearsip, tglarsip, lokasiarsip from bast where nobast='$nobast'");
		$queryBast=mysql_fetch_array($queryBast);
		if($queryBast['kodearsip']!='')
		{
			$kodearsip=$queryBast['kodearsip'];
		}else{
			$kodearsip='';
		}
		if($queryBast['tglarsip']!='0000-00-00')
		{
			$tglarsip=substr($queryBast['tglarsip'],5,2).'/'.substr($queryBast['tglarsip'],-2).'/'.substr($queryBast['tglarsip'],0,4);
		}else{
			$tglarsip='';
		}
		if($queryBast['lokasiarsip']!='')
		{
			$lokasiarsip=$queryBast['lokasiarsip'];
		}else{
			$lokasiarsip='';
		}
?>
<script type="text/javascript">
  $( function() {
      $( "#tglarsip" ).datepicker();
    } );
 </script>
<article class="col-sm-12 col-md-12 col-lg-6">
	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-27" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Register Arsip</h2>
	</header>
		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<form name="" action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<center>
							<table border="0">
								<tr>
									<td>
										Nomor/Kode Arsip
									</td>
									<td align="center" width="30px"> : </td>
									<td>
										<label class="input">
											<input type="hidden" name="nobast" value="<?php echo $nobast;?>">
											<input type="text" name="kodearsip" value="<?php echo "$kodearsip";?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Tanggal Arsip
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="tglarsip" id="tglarsip" value="<?php echo $tglarsip;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Lokasi Arsip
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="lokasiarsip" value="<?php echo $lokasiarsip;?>">
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