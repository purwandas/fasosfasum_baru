<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Marking SKPD - Data Peruntukan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<form method="post" action="" name="form1" id="form1" >
					<fieldset>

						<div class="row">				
								
							<section class="col col-sm-3">
								<strong>Kata Pencarian:</strong>
							</section>
						</div>
						<div class="row">				
								
							<section class="col col-sm-3">
															
									<label class="input"> <i class="icon-append fa fa-question-circle"></i>
										<input type="text" name="term" placeholder="Kata Pencarian" 
										<?php if(isset($_POST['term'])){echo"value=".$_POST['term'];}?>>
										<b class="tooltip tooltip-bottom-right">
										<i class="fa fa-warning txt-color-teal"></i> 
										Input Nomor Bast atau Nama Pengembang atau Kelurahan atau Alamat atau Volume atau Peruntukan
										</b> 
									</label>
																
							</section>
							<section class="col col-sm-2">
								<label class="input"> 
									<button type="submit" class="btn btn-sm btn-primary" name="submit2">
										Cari
									</button>
								</label>
							</section>
						</div>
					</fieldset>
				</form>

				<section class="col col-sm-12 col-md-12 col-lg-12">
					<div class="row" style="overflow:auto;">										
						<table class="table-hover table-bordered table table-striped">

			                
			                <tr>
			                  <td class="center">NO.</td>        	
			                  <td class="center">NO BAST</td>
			                  <td class="center">TGL.BAST</td>
			                  <td class="center">ALAMAT</td>
			                  <td class="center">KELURAHAN</td>
			                  <td class="center">KECAMATAN</td>
			                  <td class="center">WILAYAH</td>
			                  <td class="center">PERUNTUKAN</td>
			                  <td class="center">PENGEMBANG</td>
			                  <td class="center">VOLUME</td>
			                  <td class="center">SATUAN</td>
			                  <td class="center">NILAI</td>
			                  <td class="center">Action</td>

			                  
			                </tr>



			              
			              <?php
			              include "koneksi.php";
			              if(isset($_REQUEST['submit2'])) {

			               
			               $term = $_POST['term']; 
			               
			               $query = "SELECT * FROM akun a inner join bast b on a.nobast=b.nobast inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan inner join lokasidokumen l on a.nobast=l.nobastlokasi where pengembangbast like '%$term%' or kelurahan like '%$term%' or alamataset like '%$term%' or volume like '%$term%' or deskripsi like '%$term%' or a.nobast like '%$term%'";

			             }else


			             $query = "SELECT * FROM akun a inner join bast b on a.nobast=b.nobast inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan inner join lokasidokumen l on a.nobast=l.nobastlokasi ";

			             // echo $query;
			             $query=mysql_query($query) or die(mysql_error());


			             $no = 1;
			             while ($data = mysql_fetch_array($query)) {
			               ?>
			                 <tr>
			                   <td class="center"><?php echo $no; ?></td>
			                   <td class="left"><?php echo $data['nobast']; ?></td>
			                   <td class="left"><?php echo $data['tglbast']; ?></td>
			                   <td class="left"><?php echo $data['alamataset']; ?></td>
			                   <td class="left"><?php echo $data['kelurahan']; ?></td>
			                   <td class="left"><?php echo $data['kecamatan']; ?></td>
			                   <td class="left"><?php echo $data['wilayah']; ?></td>
			                   <td class="left"><?php echo $data['deskripsi']; ?></td>
			                   <td class="left"><?php echo $data['pengembangbast']; ?></td>
			                   <td class="center"><?php echo $data['volume']; ?></td>
			                   <td class="center"><?php echo $data['satuan']; ?></td>
			                   <td class="left"><?php  print number_format  ($data['nilaimix'],2); ?></td>

			                   <td class="center"><a href="index.php?hal=entryskpd&id=<?php echo $data['idperuntukan']; ?>" class="btn btn-info">Marking SKPD</a></td>
			                 </tr>
			               <?php
			               $no++;
			             }

			             
			             ?>

			           </table>
					</div>
				</section>

			</div>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->