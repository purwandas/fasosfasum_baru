<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_blue.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">
	function submit() {
      document.getElementById("formaset").submit();
    }
</script>
 <article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Edit BAST</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
						<form method="get" action="index.php?hal=lihatperuntukan" id="formaset">
							<input type="hidden" name="hal" value="dataaset">

						      <div id="content" class="box">
						        
						          <?php
						          $query="select * from dataaset";
						          if(isset($_GET['alamataset'])){
						            $cek='0';
						            if($_GET['alamataset']!=''){$alamat="alamataset like '%$_GET[alamataset]%'";$cek='1';}else{$alamat='';}
						            if($_GET['wilayah']!=''){$wilayah="wilayah like '%$_GET[wilayah]%'";if($cek!='0'){$wilayah=' and '.$wilayah;}}else{$wilayah='';}
						            if($_GET['kecamatan']!=''){$kecamatan="kecamatan like '%$_GET[kecamatan]%'";if($cek!='0'){$kecamatan=' and '.$kecamatan;}}else{$kecamatan='';}
						            if($_GET['kelurahan']!=''){$kelurahan="kelurahan like '%$_GET[kelurahan]%'";if($cek!='0'){$kelurahan=' and '.$kelurahan;}}else{$kelurahan='';}
						            if($_GET['nobastaset']!=''){$nobast="nobastaset like '%$_GET[nobastaset]%'";if($cek!='0'){$nobast=' and '.$nobast;}}else{$nobast='';}
						            if($_GET['latitude']!=''){$latitude="latitude like '%$_GET[latitude]%'";if($cek!='0'){$latitude=' and '.$latitude;}}else{$latitude='';}
						            if($_GET['longitude']!=''){$longitude="longitude like '%$_GET[longitude]%'";if($cek!='0'){$longitude=' and '.$longitude;}}else{$longitude='';}
						            
						              $query.=" where $alamat $wilayah $kecamatan $kelurahan $nobast $latitude $longitude";
						          }

						          $reclimit=20;
						          if(isset($_GET['page'])){
						            $offset=($_GET['page']-1)*$reclimit;
						          }else{
						            $offset=0;
						          }
						          if(empty($_GET)){
						            $qr='?';
						          }else{
						            $qr='&';
						          }
						          include ("pagination.php");
						          if(isset($_GET['page'])){
						            $plng=strlen($_GET['page']);
						            $pth=substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",0,strlen("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")-(5+$plng));
						            $cp=$_GET['page'];
						          }else{
						            $pth="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]$qr";
						            $cp=1;
						          }
						          $limit=" LIMIT $offset, $reclimit";
						          $totalData=mysql_num_rows(mysql_query($query));
						          $page=ceil(mysql_num_rows(mysql_query($query))/$reclimit);
						          $qpaging=$query;
						          // echo $query;
						          $query.=$limit;
						          $no=$offset+1;
						          echo "<div align='right'>".pagination($qpaging,$reclimit,$cp,"$pth")."</div> <br><br>";

						          ?>
						        <div style="overflow:auto">
									<table class="table table-bordered table-striped table-hover">
										<tr>
											<td>
												<b>No.</b>
											</td>
											<td>
												<b>Alamat</b>
											</td>
											<td>
												<b>Wilayah</b>
											</td>
											<td>
												<b>Kecamatan</b>
											</td>
											<td>
												<b>Kelurahan</b>
											</td>
											<td>
												<b>No. Bast</b>
											</td>
											<td>
												<b>Latitude</b>
											</td>
											<td>
												<b>Longitude</b>
											</td>
										</tr>
										<tr>
											<td>
												<i class="fa fa-search"></i>
											</td>
											<td>
												<input type="text" onchange="submit()" name="alamataset" placeholder="Alamat" value="<?php if(isset($_GET['alamataset'])){echo $_GET['alamataset'];}?>">
											</td>
											<td>
												<input type="text" onchange="submit()" name="wilayah" placeholder="Wilayah" value="<?php if(isset($_GET['wilayah'])){echo $_GET['wilayah'];}?>">
											</td>
											<td>
												<input type="text" onchange="submit()" name="kecamatan" placeholder="Kecamatan" value="<?php if(isset($_GET['kecamatan'])){echo $_GET['kecamatan'];}?>">
											</td>
											<td>
												<input type="text" onchange="submit()" name="kelurahan" placeholder="Kelurahan" value="<?php if(isset($_GET['kelurahan'])){echo $_GET['kelurahan'];}?>">
											</td>
											<td>
												<input type="text" onchange="submit()" name="nobastaset" placeholder="No. Bast" value="<?php if(isset($_GET['nobastaset'])){echo $_GET['nobastaset'];}?>">
											</td>
											<td>
												<input type="text" onchange="submit()" name="latitude" placeholder="Latitude" value="<?php if(isset($_GET['latitude'])){echo $_GET['latitude'];}?>">
											</td>
											<td>
												<input type="text" onchange="submit()" name="longitude" placeholder="Longitude" value="<?php if(isset($_GET['longitude'])){echo $_GET['longitude'];}?>">
											</td>
										</tr>
										<?php
											$query=mysql_query($query);
											while ($data=mysql_fetch_array($query)) 
											{
												echo"
													<tr>
														<td>
															$no
														</td>
														<td>
															$data[alamataset]
														</td>
														<td>
															$data[wilayah]
														</td>
														<td>
															$data[kecamatan]
														</td>
														<td>
															$data[kelurahan]
														</td>
														<td>
															$data[nobastaset]
														</td>
														<td>
															$data[latitude]
														</td>
														<td>
															$data[longitude]
														</td>
													</tr>
												";
												$no++;
											}
										?>
										
									</table>
								</div>
						        <?php
									echo "<br><div align='left'> <b>*) $totalData Data ditemukan</b> </div>";
				                	echo "<div align='right'>".pagination($qpaging,$reclimit,$cp,"$pth")."</div>";
				                ?>
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