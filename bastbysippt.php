
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i> </span>
		<!-- <h2>Pencarian Data</h2> -->
		<!-- <span style="padding-top:10px;">asdasdjbh</span> -->
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
					<?php 
			         include "koneksi.php";
			         $id = $_GET['id'];
			         $query = mysql_query("select * from detaildokacuan dd inner join dokumenacuan da on dd.idkategori=da.idkategori where nodokacuan='$id'") or die(mysql_error());
			         $data = mysql_fetch_array($query);
			         ?>
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<h2>Data Dokumen Acuan</h2>
							<br>
							<table class="size130">
				              <tr>
				                <td>Kode Dokumen Acuan </td>
				                <td width="10px">: </td>
				                <td><?php echo $data['idkategori']; ?></td>
				              </tr>
				              <tr>
				                <td>Jenis Dokumen </td>
				                <td>:</td>
				                <td><?php echo $data['jenisdokumen']; ?></td>
				              </tr>
				              <tr>
				                <td>No.Dok Acuan </td>
				                <td>: </td>
				                <td><?php echo $data['nodokacuan']; ?></td>
				              </tr>
				              <tr>
				                <td>Tgl.Dok Acuan </td>
				                <td>: </td>
				                <td><?php echo $data['tgldokacuan']; ?></td>
				              </tr>
				              <tr>
				                <td>Pemegang</td>
				                <td>: </td>
				                <td><?php echo $data['pemegangdokacuan']; ?></td>
				              </tr>
				              <tr>
				                <td>Perihal</td>
				                <td>:</td>
				                <td><?php echo $data['haldokacuan']; ?></td> 
				              </tr>
				              <tr>
				                <td>Keterangan </td>
				                <td>:</td>
				                <td><?php echo $data['ketdokacuan']; ?></td> 
				              </tr>
				              <tr>
				                  <?php 
				                  $qr="select nama_asli,nama_file,path from upload where nodokacuan='$data[nodokacuan]'";
				                  $qp=mysql_query($qr);
				                  while ($dq=mysql_fetch_array($qp)) {
				                    echo"
				                    <td>File Acuan </td><td>:</td>
				                    <td>
				                    <a href='download.php?id=$data[nodokacuan]&type=a'>$dq[nama_asli]</a>
				                    </td> 
				                    ";
				                  }
				                 ?>
				              </tr>

				            </table>
						</section>
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<h2>Detail BAST</h2>
							<br>
							<table class="size130 table table-hover table-striped ">
				                <tr>
				                  <td class="text-center">No.</td>  
				                  <td class="text-center">No.BAST</td>        	
				                  <td class="text-center">Tgl.BAST</td>
				                  <td class="text-center">Pengembang</td>
				                  <td class="text-center">Perihal</td>
				                  <td class="text-center">Kategori</td>
				                  <td class="text-center">Kode Arsip</td>
				                  <td class="text-center">No.Dok Acuan</td>
				                  <td class="text-center">Action</td>
				                </tr>
				              <?php 
				              include "koneksi.php";
				              $id = $_GET['id'];
				              $query2 = mysql_query("select * from bast where nodokacuan='".$data['nodokacuan']."'") or die(mysql_error());
				              
				              $no = 1;
				              while ($data2 = mysql_fetch_array($query2)){
				               ?>
				                 <tr>
				                   <td class="text-center"><?php echo $no; ?></td>
				                   <td class=""><?php echo $data2['nobast']; ?></td>
				                   <td class="text-center"><?php echo $data2['tglbast']; ?></td>
				                   <td class=""><?php echo $data2['pengembangbast']; ?></td>
				                   <td class="text-center"><?php echo $data2['perihalbast']; ?></td>
				                   <td class=""><?php echo $data2['keterangan']; ?></td>
				                   <td class="text-center"><?php echo $data2['kodearsip']; ?></td>
				                   <td class=""><?php echo $data2['nodokacuan']; ?></td>
				                   <td class="text-center"><a href="index.php?hal=viewdetailbast&id=<?php echo $data2['nobast']; ?>">view</a></td>
				                 </tr>
				               <?php
				               $no++;
				             }
				             ?>
				             
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