<?php
	if (isset($_POST['submit'])) 
	{
		include 'tracking.php';
	    $nobast=$_POST['nobast'];
	    $namaskpd=$_POST['namaskpd'];

		$tglsk= $_POST['tglsk'];
	    $cekTgl=mysql_query("select tglskgub from bast where nobast='$nobast'");
	    $cekTgl=mysql_fetch_array($cekTgl);
	    if($cekTgl['tglskgub']!=$tglsk)
	    {
	      $tglsk=substr($tglsk, -4).'-'.substr($tglsk, 0,2)."-".substr($tglsk, 3,2);
	    }else{
	      $tglsk=substr($tglsk,-4).'-'.substr($tglsk, 3,2).'-'.substr($tglsk, 0,2);
	    }

	    $nosk=$_POST['nosk'];
	    $queryAset=mysql_query("update bast set namapihakketiga='', nopks='', peruntukan='', tglpks='', tglberakhirpks='' where nobast='$nobast'");
	    $queryAset="update bast set noskgub='$nosk', tglskgub='$tglsk', namaskpd2='$namaskpd' where nobast='$nobast'";
	    // echo "$queryAset";
	    if($queryAset=mysql_query($queryAset))
	    {
	    	tracking("SKPD Aset BAST: $nobast");
	    }
	    echo mysql_error($koneksi);
	}
	else if (isset($_POST['submit2'])) 
	{
		include 'tracking.php';
	    $nobast=$_POST['nobast'];

		$tglpks=$_POST['tglpks'];
	    $cekTgl=mysql_query("select tglpks from bast where nobast='$nobast'");
	    $cekTgl=mysql_fetch_array($cekTgl);
	    if($cekTgl['tglpks']!=$tglpks)
	    {
	      $tglpks=substr($tglpks, -4).'-'.substr($tglpks, 0,2)."-".substr($tglpks, 3,2);
	    }else{
	      $tglpks=substr($tglpks,-4).'-'.substr($tglpks, 3,2).'-'.substr($tglpks, 0,2);
	    }

	    $tglberakhirpks=$_POST['tglberakhirpks'];
	    $cekTgl=mysql_query("select tglberakhirpks from bast where nobast='$nobast'");
	    $cekTgl=mysql_fetch_array($cekTgl);
	    if($cekTgl['tglberakhirpks']!=$tglberakhirpks)
	    {
	      $tglberakhirpks=substr($tglberakhirpks, -4).'-'.substr($tglberakhirpks, 0,2)."-".substr($tglberakhirpks, 3,2);
	    }else{
	      $tglberakhirpks=substr($tglberakhirpks,-4).'-'.substr($tglberakhirpks, 3,2).'-'.substr($tglberakhirpks, 0,2);
	    }

	    $namapihakketiga=$_POST['namapihakketiga'];
	    $nopks=$_POST['nopks'];
	    $peruntukan=$_POST['peruntukan'];

	    $queryAset=mysql_query("update bast set noskgub='', tglskgub='', namaskpd2='' where nobast='$nobast'");
	    $queryAset="update bast set namapihakketiga='$namapihakketiga', nopks='$nopks', peruntukan='$peruntukan', tglpks='$tglpks', tglberakhirpks='$tglberakhirpks' where nobast='$nobast'";
	    // echo "$queryAset";
	    if($queryAset=mysql_query($queryAset))
	    {
	    	tracking("SK Pemanfaatan Aset BAST: $nobast");
	    }
	    echo mysql_error($koneksi);
	}
	
	if(isset($_GET['nobast']))
	{
		$nobast=$_GET['nobast'];
		$queryBast=mysql_query("select noskgub, tglskgub, namaskpd2, namapihakketiga, nopks, peruntukan, tglpks, tglberakhirpks from bast where nobast='$nobast'");
		$queryBast=mysql_fetch_array($queryBast);
		function dateToCalendar($date)
		{
			if($date!='0000-00-00')
			{
				$date=substr($date,5,2).'/'.substr($date,-2).'/'.substr($date,0,4);
			}else{
				$date='';
			}
			return $date;
		}
		$tglsk=dateToCalendar($queryBast['tglskgub']);
		$tglpks=dateToCalendar($queryBast['tglpks']);
		$tglberakhirpks=dateToCalendar($queryBast['tglberakhirpks']);
		$nosk=$queryBast['noskgub'];
		$namaskpd=$queryBast['namaskpd2'];
		$namapihakketiga=$queryBast['namapihakketiga'];
		$nopks=$queryBast['nopks'];
		$peruntukan=$queryBast['peruntukan'];
		
?>
<script type="text/javascript">
  $( function() {
      $( "#tglsk" ).datepicker();
      $( "#tglpks" ).datepicker();
      $( "#tglberakhirpks" ).datepicker();
      $("#opt").change(function(){
      	if($("#opt").val()=='SKPD')
      	{
      		$("#Pemanfaatan").hide();
      		$("#SKPD").show();
      	}else{
      		$("#SKPD").hide();
      		$("#Pemanfaatan").show();
      	}
      });
    } );
 </script>
 <style type="text/css">
 	<?php 
 		if($namapihakketiga!='')
 		{
 			echo "
 				#SKPD{
			 		display: none;
			 	}
 			";
 		}else{
 			echo "
 				#Pemanfaatan{
			 		display: none;
			 	}
 			";
 		}
 	?>
 	
 </style>
<article class="col-sm-12 col-md-12 col-lg-6">
	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-27" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Register Arsip Pengendali Aset</h2>
	</header>
		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<section class="col col-sm-12 col-md-12 col-lg-12">
						<select name="opt" id="opt" class="btn btn-sm btn-success">
							<?php 
						 		if($namapihakketiga!='')
						 		{
						 			echo "
						 				<option value='Pemanfaatan'>SK Pemanfaatan</option>
						 				<option value='SKPD'>SKPD</option>
						 			";
						 		}else{
						 			echo "
						 				<option value='SKPD'>SKPD</option>
										<option value='Pemanfaatan'>SK Pemanfaatan</option>
						 			";
						 		}
						 	?>
							
						</select>
					</section>
					<form name="SKPD" id="SKPD" action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<center>
							<table border="0">
								<tr>
									<td>
										Nomor SK Gub.
									</td>
									<td align="center" width="30px"> : </td>
									<td>
										<label class="input">
											<input type="hidden" name="nobast" value="<?php echo $nobast;?>">
											<input type="text" name="nosk" value="<?php echo "$nosk";?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Tanggal SK Gub.
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="tglsk" id="tglsk" value="<?php echo $tglsk;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Nama SKPD / UKPD
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="namaskpd" value="<?php echo $namaskpd;?>">
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

	                <form name="Pemanfaatan" id="Pemanfaatan" action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<center>
							<table border="0">
								<tr>
									<td>
										Nama Pihak Ketiga
									</td>
									<td align="center" width="30px"> : </td>
									<td>
										<label class="input">
											<input type="hidden" name="nobast" value="<?php echo $nobast;?>">
											<input type="text" name="namapihakketiga" value="<?php echo "$namapihakketiga";?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										No. PKS
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="nopks" value="<?php echo $nopks;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Peruntukan
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="peruntukan" value="<?php echo $peruntukan;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Tgl. PKS
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="tglpks" id="tglpks" value="<?php echo $tglpks;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td>
										Tgl. Berakhir PKS
									</td>
									<td align="center"> : </td>
									<td>
										<label class="input">
											<input type="text" name="tglberakhirpks" id="tglberakhirpks" value="<?php echo $tglberakhirpks;?>">
										</label>
									</td>
								</tr>
								<tr>
									<td colspan="3" align="right">
										<br>
										<input type="submit" name="submit2" value="Register Arsip" class="btn btn-sm btn-info">
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