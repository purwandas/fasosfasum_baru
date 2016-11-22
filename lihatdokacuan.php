<!-- PAGE RELATED PLUGIN(S) -->
<script src="JS/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="JS/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="JS/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="JS/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="JS/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

    $(".rowdata").click(function(){
      $(this).closest('tr').next().toggle();
    });
	
});

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
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th>No.</th>
													<th>No. Dokumen Acuan</th>
													<th>Tanggal Acuan</th>
													<th>Perihal Acuan</th>
													<th>Pemegang Acuan</th>
													<th>Keterangan</th>
													<th>Kategori</th>
													<th>Act.</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=0;
													$query="select * from detaildokacuan";
													$query=mysql_query($query);
													while ($data=mysql_fetch_array($query)) 
													{
														$no++;
														$query2=mysql_query("select jenisdokumen from dokumenacuan where idkategori='$data[idkategori]'");
														$data2=mysql_fetch_array($query2);
														echo "
															<tr class='rowdata'>
																<td>$no</td>
																<td>$data[nodokacuan]</td>
																<td>$data[tgldokacuan]</td>
																<td>$data[haldokacuan]</td>
																<td>$data[pemegangdokacuan]</td>
																<td>$data[ketdokacuan]</td>
																<td>$data2[jenisdokumen]</td>
																<td>
																	<a href='index.php?hal=editacuan&nodokacuan=$data[nodokacuan]'>ubah</a>
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