<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_blue.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

	$(document).ready(function() {

	    $(".rowdata").click(function(){
	      $(this).closest('tr').next().toggle();
	    });
		
	});
	function submit() {
	  document.getElementById("formacuan").submit();
	}
	$( function() {
    	$( "#tgldokacuan" ).datepicker();
  	} );
</script>
<style type="text/css">
	.rowdata{
        cursor: pointer;
        cursor: hand;
    }
    .rowdetail{
        display: none;
    }
</style>

<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Data Dokumen Acuan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12 table-responsive">
						<?php
							$query="select nodokacuan, tgldokacuan, haldokacuan, pemegangdokacuan, ketdokacuan, max(versi), jenisdokumen from detaildokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori ";
							if (isset($_POST)) 
							{
								$cek=0;
								if($_POST['nodokacuan']!="")
								{
									$nodokacuan=" nodokacuan like '%".$_POST['nodokacuan']."%'";
									$nodokacuanv="value='".$_POST['nodokacuan']."'";
									$cek=1;
								}else{
									$nodokacuan="";
									$nodokacuanv="pret";
								}
								if($_POST['tgldokacuan']!=""){
									$tgldokacuan=" tgldokacuan like '%".$_POST['tgldokacuan']."%'";
									$tgldokacuanv="value='".$_POST['tgldokacuan']."'";
									if($cek!='0'){$tgldokacuan=' and '.$tgldokacuan;}
									$cek='1';
								}else{
									$tgldokacuan="";
									$tgldokacuanv="";
								}
								if($_POST['perihal']!=""){
									$perihal=" haldokacuan like '%".$_POST['perihal']."%'";
									$perihalv="value='".$_POST['perihal']."'";
									if($cek!='0'){$perihal=' and '.$perihal;}
									$cek='1';
								}else{
									$perihal="";
									$perihalv="";
								}
								if($_POST['pemegangdokacuan']!=""){
									$pemegangdokacuan=" pemegangdokacuan like '%".$_POST['pemegangdokacuan']."%'";
									$pemegangdokacuanv="value='".$_POST['pemegangdokacuan']."'";
									if($cek!='0'){$pemegangdokacuan=' and '.$pemegangdokacuan;}
									$cek='1';
								}else{
									$pemegangdokacuan="";
									$pemegangdokacuanv="";
								}
								if($_POST['keterangan']!=""){
									$keterangan=" keterangan like '%".$_POST['keterangan']."%'";
									$keteranganv="value='".$_POST['keterangan']."'";
									if($cek!='0'){$keterangan=' and '.$keterangan;}
									$cek='1';
								}else{
									$keterangan="";
									$keteranganv="";
								}
								if($_POST['kategori']!=""){
									$kategori=" jenisdokumen like '%".$_POST['kategori']."%'";
									$kategoriv="value='".$_POST['kategori']."'";
									if($cek!='0'){$kategori=' and '.$kategori;}
									$cek='1';
								}else{
									$kategori="";
									$kategoriv="";
								}

								if($cek!=0){
									$where="where";
								}else{
									$where="";
								}
								$query.=" $where $nodokacuan $tgldokacuan $perihal $pemegangdokacuan $keterangan $kategori group by nodokacuan ";
							}
							// echo mysql_num_rows(mysql_query($query))."<--rows<br>$query";
						?>			
									<form id="formacuan" method="post" action="index.php?hal=lihatdokacuan">
									<?
										$reclimit=20;
						                if(isset($_GET['page']))
						                {
						                  $offset=($_GET['page']-1)*$reclimit;
						                }
						                else
						                {
						                  $offset=0;
						                }
						                if(empty($_GET)){
						                  $qr='?';
						                }else{
						                  $qr='&';
						                }
						                if($_GET['kategori']!='dokacuan'){
						                  $k=2;
						                }else{
						                  $k=3;
						                }
						                include ("pagination.php");
						                
						                if(isset($_GET['page']))
						                {
						                  $plng=strlen($_GET['page']);
						                  $pth=substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",0,strlen("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")-(5+$plng));
						                  $cp=$_GET['page'];
						                }
						                else
						                {
						                  $pth="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]$qr";
						                  $cp=1;
						                }

						                $limit=" LIMIT $offset, $reclimit";
						                $query.=$order;
						                $_SESSION['query']=$query;
						                $qpaging=$_SESSION['query'];
						                $totalData=mysql_num_rows(mysql_query($qpaging));
						                $page=ceil(mysql_num_rows(mysql_query($query))/$reclimit);
						                $query.=$limit;
						                $no=$offset+1;


						                $jmlRow=mysql_num_rows(mysql_query($qpaging));
						                
					                    echo "
					                    	<div align='right' class='col-md-4 text-left'>
					                    	* <b>$jmlRow</b> <i>Data ditemukan</i>
					                    	</div>
					                    	<div align='right' class='col-md-8'>
					                    		".pagination($qpaging,$reclimit,$cp,"$pth")."<br><br> 
					                    	</div>
					                    ";
									?>
										<table class="table table-bordered table-hover table-responsive" width="100%">
											<thead>			                
												<tr>
													<th>No.</th>
													<th>No. Dokumen Acuan</th>
													<th class="text-center">Tanggal Acuan</th>
													<th>Perihal Acuan</th>
													<th>Pemegang Acuan</th>
													<th>Keterangan</th>
													<th>Kategori</th>
													<th class="text-center">Act.</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th class="text-center">
														<i class="fa fa-lg fa-fw fa-search"></i>
													</th>
													<th>
														<label class="input">
															<input type="text" <?php echo $nodokacuanv; ?> name="nodokacuan" onchange="submit()">
														</label>
													</th>
													<th>
														<label class="input">
															<input type="text" <?php echo $tgldokacuanv; ?> name="tgldokacuan" onchange="submit()" id="tgldokacuan">
														</label>
													</th>
													<th>
														<label class="input">
															<input type="text" <?php echo $perihalv; ?> name="perihal" onchange="submit()">
														</label>
													</th>
													<th>
														<label class="input">
															<input type="text" <?php echo $pemegangdokacuanv; ?> name="pemegangdokacuan" onchange="submit()">
														</label>
													</th>
													<th>
														<label class="input">
															<input type="text" <?php echo $keteranganv; ?> name="keterangan" onchange="submit()">
														</label>
													</th>
													<th>
														<label class="input">
															<input type="text" <?php echo $kategoriv; ?> name="kategori" onchange="submit()">
														</label>
													</th>
													<th class="text-center">
														<i class="fa fa-lg fa-fw fa-search"></i>
													</th>
												</tr>
												<?php
													$no=($offset);
													$query=mysql_query($query);
													while ($data=mysql_fetch_array($query)) 
													{
														$no++;
														echo "
															<tr class='rowdata'>
																<td>$no</td>
																<td>$data[nodokacuan]</td>
																<td>$data[tgldokacuan]</td>
																<td>$data[haldokacuan]</td>
																<td>$data[pemegangdokacuan]</td>
																<td>$data[ketdokacuan]</td>
																<td>$data[jenisdokumen]</td>
																<td valign='middle'>
																	<center>
																		<a href='index.php?hal=editacuan&nodokacuan=$data[nodokacuan]' class='btn btn-sm btn-info' style='width:60px;'>Ubah</a>
																		 <hr>
																		<a href='index.php?hal=adendum&nodokacuan=$data[nodokacuan]' class='btn btn-sm btn-success' style='width:60px;padding-left:3px;'>Adendum</a> 
																	</center>
																</td>
															</tr>
														";
														echo"<tr class=rowdetail><td colspan=8>
															<table border=1 class='table table-striped'>
																<tr>
																	<td><b>Deskripsi</b></td>
																	<td><b>Jenis Fasos Fasum</b></td>
																	<td><b>Luas Kewajiban</b></td>
																	<td><b>Luas Diserahkan</b></td>
																</tr>
															";
	$queryKewajiban=mysql_query("select * from kewajiban where nodokacuan='$data[nodokacuan]'");
	while ($dataKewajiban=mysql_fetch_array($queryKewajiban)) 
	{
		$luasKewajiban=$dataKewajiban['luas']+$dataKewajiban['pelunasan'];
		echo"
			<tr>
				<td>$dataKewajiban[deskripsi]</td>
				<td>$dataKewajiban[jenisfasos]</td>
				<td>$luasKewajiban</td>
				<td>$dataKewajiban[pelunasan]</td>
			</tr>
		";
	}
														echo"</table>
														</td></tr>";
														// inner join detaildokacuan on kewajiban.nodokacuan=detaildokacuan.nodokacuan inner join peruntukan on detaildokacuan.nodokacuan=peruntukan.nodokacuan
													}
												?>
												
											</tbody>
										</table>
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